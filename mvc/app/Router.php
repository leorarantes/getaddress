<?php 

namespace App;
use MF\Bootstrap;

class Router extends Bootstrap {

    protected function init_routes() {
        $routes['home'] = array(
            'path' => '/',
            'query' => ['string' => 'cep', 'required' => false],
            'controller' => 'Controller',
            'action' => 'home/query_cep'
        );

        $this->routes = $routes;
    }

    public function run($url) {
        // select right route
        foreach($this->routes as $route) {
            if ($route['path'] == $url['path']) {
                $url_query = $this->extract_query($url);
                $route_query = $route['query'];
                $this->handle_query_errors($url_query, $route_query);

                // select right controller
                $class = "\\App\\Controllers\\" . $route['controller'];
                $controller = new $class;

                // get action
                $action = explode('/', $route['action']);
                // case there is some query
                if($url_query) {
                    $action = $action[1];
                    // load action
                    $controller->$action($url_query['value']);
                }
                else {
                    $action = $action[0];
                    // load action
                    $controller->$action();
                }
            }
        }
    }
}

?>