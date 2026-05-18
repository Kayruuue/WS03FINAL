<?php
    function basePath(string $path): string {
        return BASE_PATH . '/' . $path;
    }

    function resolveAppPath(array $candidates): ?string {
        foreach ($candidates as $candidate) {
            if (file_exists($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    function viewNameVariants(string $name): array {
        $segments = array_values(array_filter(explode('/', str_replace('\\', '/', $name)), 'strlen'));

        if (empty($segments)) {
            return [$name];
        }

        $variants = [implode('/', $segments)];

        if (count($segments) > 1) {
            $segments[0] = ucfirst($segments[0]);
            $variants[] = implode('/', $segments);
        }

        return array_values(array_unique($variants));
    }

    function loadView($name, $data = []) {
        $viewPath = null;

        foreach (viewNameVariants($name) as $variant) {
            $viewPath = resolveAppPath([
                basePath('App/Views/' . $variant . '.view.php'),
                basePath('app/Views/' . $variant . '.view.php'),
                basePath('App/views/' . $variant . '.view.php'),
                basePath('app/views/' . $variant . '.view.php'),
            ]);

            if ($viewPath !== null) {
                break;
            }
        }

        if ($viewPath !== null && file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            die("View not found: " . $name);
        }
    }

    function loadPartial($name, $data = []) {
        $partialPath = resolveAppPath([
            basePath('App/Views/Partials/' . $name . '.php'),
            basePath('app/Views/Partials/' . $name . '.php'),
            basePath('App/views/partials/' . $name . '.php'),
            basePath('app/views/partials/' . $name . '.php'),
        ]);

        if ($partialPath !== null && file_exists($partialPath)) {
            extract($data);
            require $partialPath;
        } else {
            die("Partial not found: " . $name);
        }
    }

    function inspect($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    function inspectAndDie($value) {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }

    function formatSalary($salary) {
        return '$' . number_format((float)$salary, 2, '.', ',');
    }

    function sanitize($dirty) {
        return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
    }

    function redirect($url) {
        header("Location: {$url}");
        exit();
    }

    function appUrl(string $path = ''): string {
        return '/' . ltrim($path, '/');
    }

    function compatDb(): Framework\Database {
        static $db = null;

        if ($db === null) {
            $config = require basePath('config/db.php');
            $db = new Framework\Database($config);
        }

        return $db;
    }

    function getListings($limit = null, array $filters = []): array {
        $db = compatDb();
        $query = 'SELECT * FROM listings';
        $conditions = [];
        $params = [];

        $keywords = trim($filters['keywords'] ?? '');
        if ($keywords !== '') {
            $conditions[] = '(title LIKE :keywords OR description LIKE :keywords OR tags LIKE :keywords OR company LIKE :keywords)';
            $params['keywords'] = '%' . $keywords . '%';
        }

        $location = trim($filters['location'] ?? '');
        if ($location !== '') {
            $conditions[] = '(city LIKE :location OR state LIKE :location)';
            $params['location'] = '%' . $location . '%';
        }

        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $query .= ' ORDER BY created_at DESC';

        if ($limit !== null) {
            $limit = max(0, (int) $limit);
            $query .= ' LIMIT ' . $limit;
        }

        return $db->Query($query, $params)->fetchAll();
    }

    function findListing($id) {
        return compatDb()->Query(
            'SELECT * FROM listings WHERE id = :id',
            ['id' => $id]
        )->fetch();
    }

    function createListing(array $data, array &$errors = []): ?int {
        $allowedFields = [
            'title', 'description', 'salary', 'tags',
            'company', 'address', 'city', 'state',
            'phone', 'email', 'requirements', 'benefits'
        ];

        $newListingData = array_intersect_key($data, array_flip($allowedFields));

        foreach ($allowedFields as $field) {
            $newListingData[$field] = $newListingData[$field] ?? null;
            if ($newListingData[$field] === '') {
                $newListingData[$field] = null;
            }
        }

        $newListingData = array_map(
            static fn ($value) => $value === null ? null : sanitize($value),
            $newListingData
        );

        $requiredFields = ['title', 'description', 'salary', 'email', 'city', 'state'];

        foreach ($requiredFields as $field) {
            if (empty($newListingData[$field])) {
                $errors[] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            return null;
        }

        $sessionUser = Framework\Session::get('user');
        $newListingData['user_id'] = $sessionUser['id'] ?? null;

        $fields = implode(', ', array_keys($newListingData));
        $values = ':' . implode(', :', array_keys($newListingData));

        compatDb()->Query(
            "INSERT INTO listings ({$fields}) VALUES ({$values})",
            $newListingData
        );

        return (int) compatDb()->conn->lastInsertId();
    }
?>
