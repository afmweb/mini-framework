<?php
class Sobre extends ControllerMain{
    public function __construct() {
        parent::__construct();        
     //  $this->setModel('ManterUsuario_model');
    }    
    public  function index() {
       $dadosSite = array(
           'metaKeywords' => 'Programação PHP, Sistemas, Sites, Internet, Web, Desenvolvimento, PHP, MYQL, PostgreSql',
           'metaDescription' => 'Pagina sobre André Marcelino',
           'metaAuthor' => 'André Fauze Marcelino',
           'metaTitle' => 'André Marcelino Desenvolvimento Web com PHP, MYSQL, PostgreSql e JQuery',
           'pgConteudo' => 'arquivos/vwSobre',
           'classAtivo' =>  'Sobre',
           'css1' =>  '<link rel="stylesheet" href="'.SITE_URL.'app/public/css/sobre.css" type="text/css" />'
       );       
        $view = new RainTPL();
        $view->assign($dadosSite);
        $view->draw('tpl/tpl');//nome da view padrão
    }    
}