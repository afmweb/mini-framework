<?php
//class FuncoesHelpers{
//    //Carraga as bibliotecas do Template RainTpl
//    public function runTpl($tpl, $arrDados = null) {
//   RainTPL::configure("base_url", null );
//   RainTPL::configure("path_replace", false );
//   RainTPL::configure("tpl_dir", DIR_VIEWS);
//   RainTPL::configure("cache_dir", DIR_VIEWS_TMP );
//
//    
//    //initialize a Rain TPL object    
//    $view = new RainTPL();
//    $view->assign($arrDados);
//   return  $view->draw($tpl);//nome da view padrão    
//}
//
//
//}


/*======================================
 *      Funções Auxiliares
 *======================================*/

function getSegmento($numSegmento){
    $segmento = new Controller();
    
    return $segmento->getSegmentos($numSegmento);
}