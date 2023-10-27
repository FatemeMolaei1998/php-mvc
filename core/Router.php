<?php

namespace app\core;

use app\core\exceptions\NotFoundException;

class Router
{

    protected array $routes;
    public function __construct(public Request $request, public Response $response)
    {
        $this->routes = [
            'get' => [
                '/' => '',
                '/contact' => 'Contact'
            ],
            'post' => [
                '/' => '',
                '/contact' => 'Contact'
            ],
        ];
    }

    public function get($path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(): mixed
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback) {
            $this->response->setStatusCode(404);
            throw new NotFoundException();
        }
        if (is_string($callback)){
            return Application::$app->view->renderView($callback);
        }
        if (is_array($callback)){
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = new $callback[0]();
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request, $this->response);
    }

}