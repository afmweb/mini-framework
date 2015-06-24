<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $metaKeywords;?>" />
    <meta name="description" content="<?php echo $metaDescription;?>" />
    <meta name="author" content="<?php echo $metaAuthor;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $metaTitle;?></title>
    <style>        
        html{
            /* Imagem do Tamanho da tela */
            background:url("<?php echo $img;?>") no-repeat center center;
            min-height:100%;
            /* A Magica */
            background-size:cover;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php  echo SITE_URL;?>app/public/css/pgHome.css">
    <link rel="stylesheet" type="text/css" href="<?php  echo SITE_URL;?>app/public/css/rodape.css">
</head>
<body>
    <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("".$pgHome."") . ( substr("".$pgHome."",-1,1) != "/" ? "/" : "" ) . basename("".$pgHome."") );?>
     <script src="<?php  echo SITE_URL;?>app/public/js/jquery-1.11.1.min.js"></script>
     <script src="<?php  echo SITE_URL;?>app/public/js/js.js"></script>
</body>
</html>
