<?php
    namespace MF;

    abstract class Bootstrap {
        protected $routes;

        public function __construct() {
            // build routes
            $this->init_routes();
        }
        abstract protected function init_routes();
        
        public function get_url() {
            return parse_url($_SERVER['REQUEST_URI']);
        }
    
        protected function extract_query($url) {
            // case $there is no query on $url
            if(!isset($url['query'])) return null;
            // get query
            $query = explode('=', $url['query']);
            $query = ['string' => $query[0], 'value' => $query[1]];
            return $query;
        }
    
        protected function extract_path($url) {
            return $url['path'];
        }
    
        protected function handle_query_errors($url_query, $route_query) {
            // case route doesnt accept query and there is a query
            if(!$route_query && $url_query) {
                echo '404 - Not Found';
                throw new \Exception('404 - Not Found');
            }
            // case route requires query, but there is none
            if($route_query['required'] && !$url_query) {
                echo '404 - Not Found';
                throw new \Exception('404 - Not Found');
            }
            // case query is invalid
            if($route_query && $url_query && $route_query['string'] !== $url_query['string']) {
                echo '404 - Not Found';
                throw new \Exception('404 - Not Found');
            }
        }
    }
?>