<?php

class Router
{
    protected $routes = [];

    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri,
            'controller' => $controller,
        ];
    }

    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function error($httpCode = 404)
    {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

    public function route($uri, $method)
    {
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        $uriSegments = explode('/', trim($uri, '/'));

        foreach ($this->routes as $route) {
            $routeSegments = explode('/', trim($route['uri'], '/'));
            $params = [];

            if (count($uriSegments) !== count($routeSegments)) {
                continue;
            }

            if (strtoupper($method) !== $route['method']) {
                continue;
            }

            $matched = true;

            foreach ($routeSegments as $index => $segment) {
                if (preg_match('/^\{(.+)\}$/', $segment, $matches)) {
                    $params[$matches[1]] = $uriSegments[$index];
                    continue;
                }

                if ($segment !== $uriSegments[$index]) {
                    $matched = false;
                    break;
                }
            }

            if ($matched) {
                $GLOBALS['routeParams'] = $params;
                require basePath($route['controller']);
                return;
            }
        }

        $this->error(404);
    }
}
