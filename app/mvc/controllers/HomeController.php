<?php
class Home extends ControllerMain {
    public function __construct() {
        parent::__construct();        
     //  $this->setModel('ManterUsuario_model');
    }
    public  function index() {       
       //imagens aleatorias Home
        $arrImg =  array(
            'bg1.jpg', 'bg2.jpg', 'bg3.jpg', 'bg4.jpg', 'bg5.jpg', 'bg6.jpg', 'bg7.jpg', 'bg8.jpg', 'bg9.jpg' ,'bg10.jpg' ,'bg11.jpg','bg13.jpg','bg14.jpg','bg15.jpg','bg16.jpg','bg17.jpg', 'andre marcelino.jpg'
            );
        shuffle($arrImg);
        $nomeImg = array_slice($arrImg,0 ,1);
        
       $dadosSite = array(
           'metaKeywords' => 'Programação PHP, Sistemas, Sites, Internet, Web, Desenvolvimento, PHP, MYQL, PostgreSql',
           'metaDescription' => 'Desenvolvimento/Programação de Sistemas e Sites Para Internet',
           'metaAuthor' => 'André Fauze Marcelino',
           'metaTitle' => 'André Marcelino - Desenvolvedor Web/PHP, MYSQL, PostgreSql, JQuery etc.',
           'pgHome' => 'arquivos/pgHome',
           'img' => DIR_PUBLIC . 'img/'. $nomeImg[0]
       );       
        $view = new RainTPL();
        $view->assign($dadosSite);
        $view->draw('tpl/tplHome');//nome da view padrão
    }
    

}

