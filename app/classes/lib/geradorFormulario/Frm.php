<?php 

class Frm{
	private $form;	
	private $inputHiden;
	private $inputPassword;
	private $inputLabel;
	private $inputText;
	private $inputEmail;
	private $inputTextArea;
	private $inputButton;
	private $inputSubmit;
	
	static public function form( $nome='form', $method='post', $action='', $arrAtributosAdicionais=null ){
		$form = "<form name='{$nome}' method='{$method}' action='{$action}'{$arrAtributosAdicionais}>\n\t";
		return $form;
	}
	
	static public function inputHidden( $name, $value ){
		$input = "<input type='hidden' name='{$name}' value='{$value}'>\n\t";
		return $input;
	}
	
	static public function inputPassword( $name, $arrAtributos ){
		$attr = self::setAtibutos($arrAtributos);
		$input = "<input type='password' name='{$name}' id='{$name}'  {$attr}>\n\t";
		return $input;
	}
	
	static public function inputLabel($label){
		$label = "<label for='{$label}'>".ucfirst($label)."</label>\n\t";
		return $label;
	}
	
	static public function inputText( $name, $value=null, $arrAtributos=null ){	
		$attr = self::setAtibutos($arrAtributos);
		isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;
		$input = "<input type='text' name='{$name}' id='{$name}' value='{$value}' {$attr}>\n\t";
		return $input;
	}
	
	static public function inputEmail( $name,$value = null,  $arrAtributos=null ){	
		$attr = self::setAtibutos($arrAtributos);
		isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;
		$input = "<input type='email' name='{$name}' id='{$name}' value='{$value}' {$attr}>\n\t";
		return $input;
	}
        
	static public function inputTextArea( $name,$value = null,  $arrAtributos=null ){	
		$attr = self::setAtibutos($arrAtributos);
		isset($_POST[$name]) ? $value = $_POST[$name] : $value = $value;
                $input = "<textarea name='{$name}' id='{$name}' {$attr}>".$value."</textarea>\n\t";
		return $input;
	}
        
	
	static public function inputButton( $value = 'Enviar',  $arrAtributos=null ){	
		$attr = self::setAtibutos($arrAtributos);
                        " <button type='submit' class='btn btn-default btn-lg'>Enviar Mensagem <span class='glyphicon glyphicon-envelope'></span> </button>";
                $input = "<button type='submit' {$attr}>".$value."</button>";
		return $input;
	}
        
	
	static public function setAtibutos($arrAtributos){
		$attr = null;
		if( is_array($arrAtributos) && isset($arrAtributos) ):		
			foreach( $arrAtributos as $k => $v ):
				$attr .= $k . "='{$v}' ";
			endforeach;
		endif;
		return $attr;
	}
}