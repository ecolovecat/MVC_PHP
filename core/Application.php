<?php
namespace app\core;
use app\controllers\SiteController;

class Application {
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public static Application $app;
    public Controller $controller;

    public function getController():Controller {
        return $this->controller;
    }

    public function __construct($rootPath, array $config) {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
        
    }

    public function run() {
        //todo
        echo $this->router->resolve();
    }
}