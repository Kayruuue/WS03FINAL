<?php

function basePath($path = '')
{
    return __DIR__ . ($path ? '/' . ltrim($path, '/') : '');
}

function appBasePath()
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $base = preg_replace('#/index\.php$#', '', $scriptName);

    if ($base === false || $base === '' || $base === '.') {
        return '';
    }

    return rtrim($base, '/');
}

function appUrl($path = '')
{
    $base = appBasePath();

    if ($path === '' || $path === '/') {
        return $base === '' ? '/' : $base;
    }

    return ($base === '' ? '' : $base) . '/' . ltrim($path, '/');
}

function asset($path)
{
    return appUrl($path);
}

function currentPath()
{
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $base = appBasePath();

    if ($base !== '' && strpos($uri, $base) === 0) {
        $uri = substr($uri, strlen($base));
    }

    if ($uri !== '/') {
        $uri = rtrim($uri, '/');
    }

    return $uri === '' ? '/' : $uri;
}

function getDatabaseConfig()
{
    return require basePath('config/db.php');
}

function mysqlDriverAvailable()
{
    return extension_loaded('pdo_mysql');
}

function getDatabaseConnection()
{
    static $database = null;
    static $attempted = false;

    if ($database instanceof \Framework\Database) {
        return $database;
    }

    if ($attempted || !mysqlDriverAvailable()) {
        return null;
    }

    $attempted = true;

    try {
        $database = new \Framework\Database(getDatabaseConfig());
    } catch (Throwable $e) {
        return null;
    }

    return $database;
}

function loadSampleListings()
{
    return require basePath('data/listings.php');
}

function normalizeListing($listing)
{
    if (is_object($listing)) {
        $listing = (array) $listing;
    }

    $listing = is_array($listing) ? $listing : [];

    $tags = $listing['tags'] ?? [];
    if (is_string($tags)) {
        $tags = array_values(array_filter(array_map('trim', explode(',', $tags))));
    } elseif (!is_array($tags)) {
        $tags = [];
    }

    $location = trim(implode(', ', array_filter([
        $listing['city'] ?? null,
        $listing['state'] ?? null,
    ])));

    if ($location === '') {
        $location = $listing['location'] ?? '';
    }

    return [
        'id' => $listing['id'] ?? null,
        'title' => $listing['title'] ?? '',
        'description' => $listing['description'] ?? '',
        'salary' => $listing['salary'] ?? '',
        'company' => $listing['company'] ?? '',
        'address' => $listing['address'] ?? '',
        'city' => $listing['city'] ?? '',
        'state' => $listing['state'] ?? '',
        'location' => $location,
        'type' => $listing['type'] ?? '',
        'tags' => $tags,
        'requirements' => $listing['requirements'] ?? '',
        'benefits' => $listing['benefits'] ?? '',
        'phone' => $listing['phone'] ?? '',
        'email' => $listing['email'] ?? '',
        'created_at' => $listing['created_at'] ?? null,
    ];
}

function filterSampleListings(array $listings, $keywords = '', $location = '')
{
    if ($keywords === '' && $location === '') {
        return $listings;
    }

    return array_values(array_filter($listings, function ($listing) use ($keywords, $location) {
        $haystack = strtolower(implode(' ', [
            $listing['title'] ?? '',
            $listing['description'] ?? '',
            implode(' ', $listing['tags'] ?? []),
            $listing['company'] ?? '',
        ]));

        $locationHaystack = strtolower(implode(' ', [
            $listing['location'] ?? '',
            $listing['city'] ?? '',
            $listing['state'] ?? '',
            $listing['address'] ?? '',
        ]));

        $keywordMatch = $keywords === '' || strpos($haystack, strtolower($keywords)) !== false;
        $locationMatch = $location === '' || strpos($locationHaystack, strtolower($location)) !== false;

        return $keywordMatch && $locationMatch;
    }));
}

function getListings($limit = null, array $filters = [])
{
    $keywords = trim($filters['keywords'] ?? '');
    $location = trim($filters['location'] ?? '');
    $database = getDatabaseConnection();

    if ($database) {
        $query = 'SELECT * FROM listings';
        $conditions = [];
        $params = [];

        if ($keywords !== '') {
            $conditions[] = '(title LIKE :keywords OR description LIKE :keywords OR tags LIKE :keywords OR company LIKE :keywords)';
            $params['keywords'] = '%' . $keywords . '%';
        }

        if ($location !== '') {
            $conditions[] = '(city LIKE :location OR state LIKE :location OR address LIKE :location)';
            $params['location'] = '%' . $location . '%';
        }

        if ($conditions) {
            $query .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $query .= ' ORDER BY created_at DESC, id DESC';

        if ($limit !== null) {
            $query .= ' LIMIT ' . (int) $limit;
        }

        $rows = $database->query($query, $params)->fetchAll();

        return array_map('normalizeListing', $rows);
    }

    $listings = array_map('normalizeListing', loadSampleListings());
    $listings = filterSampleListings($listings, $keywords, $location);

    if ($limit !== null) {
        $listings = array_slice($listings, 0, (int) $limit);
    }

    return $listings;
}

function findListing($id)
{
    $database = getDatabaseConnection();

    if ($database) {
        $listing = $database->query(
            'SELECT * FROM listings WHERE id = :id LIMIT 1',
            ['id' => $id]
        )->fetch();

        return $listing ? normalizeListing($listing) : null;
    }

    foreach (array_map('normalizeListing', loadSampleListings()) as $listing) {
        if ((int) $listing['id'] === (int) $id) {
            return $listing;
        }
    }

    return null;
}

function createListing(array $input, array &$errors = [])
{
    $database = getDatabaseConnection();

    if (!$database) {
        $errors[] = mysqlDriverAvailable()
            ? 'Database connection failed. Check config/db.php and your MySQL server.'
            : 'MySQL driver is not enabled in PHP yet. Enable pdo_mysql first.';
        return null;
    }

    $allowedFields = [
        'title', 'description', 'salary', 'tags', 'company',
        'address', 'city', 'state', 'phone', 'email',
        'requirements', 'benefits'
    ];

    $listing = [];

    foreach ($allowedFields as $field) {
        $value = isset($input[$field]) ? sanitize($input[$field]) : '';
        $listing[$field] = $value;
    }

    $requiredFields = ['title', 'description', 'salary', 'city', 'state', 'email'];

    foreach ($requiredFields as $field) {
        if ($listing[$field] === '') {
            $errors[] = ucfirst($field) . ' is required.';
        }
    }

    if ($listing['email'] !== '' && !filter_var($listing['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email must be valid.';
    }

    if ($errors) {
        return null;
    }

    $database->query(
        'INSERT INTO listings (
            title, description, salary, tags, company, address,
            city, state, phone, email, requirements, benefits
        ) VALUES (
            :title, :description, :salary, :tags, :company, :address,
            :city, :state, :phone, :email, :requirements, :benefits
        )',
        $listing
    );

    return (int) $database->conn->lastInsertId();
}

function formatSalary($salary)
{
    if (is_numeric($salary)) {
        return '$' . number_format((float) $salary, 2);
    }

    return (string) $salary;
}

function sanitize($dirty)
{
    return trim(filter_var((string) $dirty, FILTER_SANITIZE_SPECIAL_CHARS));
}

function redirect($path)
{
    header('Location: ' . $path);
    exit;
}

function loadView($name, $data = [])
{
    $viewPath = basePath("views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found";
    }
}

function loadPartial($name, $data = [])
{
    $partialPath = basePath("views/partials/{$name}.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found";
    }
}

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}
