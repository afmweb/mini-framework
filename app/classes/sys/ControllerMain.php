<?php 

class ControllerMain{
    private $Rota;
    private $Segmentos;
    public $Controller;
    protected $Model;
    public $Action;
    public $Params;

    function __construct() {
        $this->setRota();
        $this->setSegmentos();
        $this->setController();
        $this->setAction();
        $this->setParams();
        $this->runTplConfig();
    }

    private function setRota() {
        $dominio = $_SERVER['HTTP_HOST'];
        $url = "http://" . $dominio . $_SERVER['REQUEST_URI'];
        $url = \str_replace('www.', '', $url);
        (substr($url, -1) == '/') ? $url : $url = $url . '/';
        $this->Rota = $url;
    }

    /** explode segmentos da url */
    private function setSegmentos() {
        if (SITE_URL != $this->Rota):
            $rota = str_replace(SITE_URL, '', $this->Rota);
            $segmentoUrl = explode('/', $rota);
        else:
            $this->Segmentos = array(PG_INDEX, 'index');
            $rota = PG_INDEX . '/index';
            $segmentoUrl = explode('/', $rota);
        endif;
        return $this->Segmentos = $segmentoUrl;
    }

    public function getSegmentos($param) {
        return $this->Segmentos[$param];
    }

    //** Seta os Controllers*/
    private function setController() {
        $this->Controller = $this->Segmentos[0];
    }

    /** Seta Actions */
    private function setAction() {
        $ac = (!isset($this->Segmentos[1]) || $this->Segmentos[1] == null || $this->Segmentos[1] == PG_INDEX ? 'index' : $this->Segmentos[1]);
        $this->Action = $ac;
    }

    /** Seta os Parametros */
    private function setParams() {


        return $this->Params = $this->Segmentos;
    }

    public function getParam($name = null) {
        if ($name != null):
            return $this->Params[$name];
        else:
            return $this->Params;
        endif;
    }

    /** Inicia a Aplicação* */
    public function run() {
        $arq = DIR_CONTROLLERS . $this->Controller . 'Controller.php';
        if (file_exists($arq)):
            require_once "$arq";
        else:
            die('<h1>' . $arq . '</h1>');
        endif;
        $app = new $this->Controller();
        if (!method_exists($app, $this->Action)):
            die('Esta action nao existe.');
        endif;
        $action = $this->Action;
        $app->$action();
    }

    //Carraga as bibliotecas do Template RainTpl
    public function runTplConfig() {
        RainTPL::configure("base_url", null);
        RainTPL::configure("path_replace", false);
        RainTPL::configure("tpl_dir", DIR_VIEWS);
        RainTPL::configure("cache_dir", DIR_VIEWS_TMP);
    }
}