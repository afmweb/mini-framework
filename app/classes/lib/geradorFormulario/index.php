<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
	<title>Formulario automatico</title>
</head>
<body>
<?php
require 'class.form.php';

?>
	<h1>Formulario html<h1>
	<form name="frm-default" action="" methot="post">
	<label for "nome">Nome</label>
	<input type="text" class="form-control" name="nome"  id="exampleInputEmail1" placeholder="Enter nome">
	<input type="hidden" name="ACAO" value="cadastrar">
	</form>
	<h1>Formulario PHP<h2>
	<?php 
		echo Frm::form('formulario');		
		echo Frm::inputHidden( 'ACAO', 'cadastrar');
		echo Frm::inputLabel('nome');
		echo Frm::inputText('nome', '', array('class'=>'bootstrap class2','maxlength'=>30 , 'placeholder'=>'Insira o campo') );
		echo '<br>';
		echo Frm::inputLabel('Senha');
		echo Frm::inputPassword('senha',  array('class'=>'bootstrap class2','placeholder'=>'Informe sua senha' ) );
		

		echo "<input type='submit' value='Enviar requisição' >";
		echo "</form>";
	?>
</body>
</html>