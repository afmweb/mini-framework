<?php

/**firs
 * Description of Core
 *
 * @author afm
 */

namespace Sys;

class Core {

    private $routes;
    // private $controllers;
    private $action;

    public function __construct() {
        $this->setRoutes($this->getUrl());
        $this->run($this->routes);
    }

    public function setControllers() {
        
    }

    /**
     * Verifico se as rotas estão na lista de rotas permitidas
     * 
     */
    public function run($arrUrl) {


        $class = "\Controllers\\" . ucfirst($arrUrl['controller']);
         $action = $arrUrl['action'];
        if (class_exists($class)   ):
            $controller = new $class;
          
        if(method_exists($controller, $action) ):
                $action = $arrUrl['action'];
                 $controller->$action();
                             else: die('404 Not found : Rota não habilitada! ');
            endif;
            
            else: die('404 Not found : Rota não habilitada! ');
            
        endif;
    }

    public function setRoutes($url) {
        
        $arrUrl = array_filter(explode('/', $url));
        $controller = isset($arrUrl[0]) ? $arrUrl[0] : ROTADEFAULT;
       $action = isset($arrUrl[1])  ? $arrUrl[1] : 'index';


        $this->routes = ['controller' => $controller, 'action' => $action];

        return $this->routes;
    }

    //Captura os segmentos
    public function getUrl() {
        if (empty(URLBASE)):
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        endif;


        $segmentos = str_replace($this->addSlah(URLBASE), '', $this->getUrlAtual());
        return $segmentos;
        //return URLBASE;
    }

    public function getUrlAtual() {
        $dominio = $_SERVER['HTTP_HOST'];
        $url = "http://" . $dominio . $_SERVER['REQUEST_URI'];
        return $url;
    }

    public function addSlah($param) {

        if (strstr($param, -1) == '/'):
            return $param;
        endif;

        return $param . '/';
    }

}
