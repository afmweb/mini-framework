<?php
class Contato extends ControllerMain{
    public function __construct() {
        parent::__construct(); 
    }    
    public  function index() {  
       
            $msg_form ='';
            $nome       = '';
            $email      = '';
            $assunto    = '';
            $mensagem   = '';          
       if( isset($_POST['nome']) ):
           //variaveis //
            $nome       = utf8_decode(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
            $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $assunto    = utf8_decode(filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING));
            $mensagem   = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
       
           //validação dos dados vindo do form
            $validator = new FormValidator();
            $validator->addValidation("nome","req","");   
            $validator->addValidation("email","req","");   
            $validator->addValidation("email","email","The input for Email should be a valid email value");            
            $validator->addValidation("assunto","req","");   
            $validator->addValidation("mensagem","req","");
            
            if($validator->ValidateForm()):
                /*Envio de email autenticado*/
                $mail = new PHPMailer();
                 $mail->IsSMTP(); // send via SMTP
                 $mail->Host = "mail.andreweb.com.br"; //seu servidor SMTP
                 $mail->SMTPAuth = true; // ‘true’ para autenticação
                 $mail->Username = "contato@andreweb.com.br"; // usuário de SMTP
                 $mail->Password = "eu*001"; // senha de SMTP

                 $mail->From = "contato@andreweb.com.br";
                 //coloque aqui o seu correio, para que a autenticação não barre a mensagem
                 $mail->FromName = "AndreWeb";
                 $mail->AddAddress("marcelinoandre@gmail.com","Nome Vindo do POST");
                 $mail->AddAddress("marcelinoandre@hotmail.com.br"); // (opcional) só o envio pelo email
                 $mail->AddReplyTo("{$email}","{$nome}");
                 //aqui você coloca o endereço de quem está enviando a mensagem pela sua página
                 $mail->WordWrap = 50; // Definição de quebra de linha
                 $mail->IsHTML(true); // envio como HTML se ‘true’
                 $mail->Subject = "{$assunto}";
                 $mail->Body = "<div style='padding:15px; background:#f4f4f4; border: 1px solid #333'>{$mensagem}</div>";
                 $mail->AltBody = "Para mensagens somente texto";

                    //Verifica se o e-mail foi enviado
                    if(!$mail->Send()):
                       $msg_form = '<div class="alert alert-warning" role="alert">Mensagem não enviada verifique as configurações de email</div>';;
                       echo "Mailer Error: " . $mail->ErrorInfo;
                       die('<h1>Não enviou<h1>');
                     else: 

                    $msg_form = '<div class="alert alert-success" role="alert">Sua mensagem foi enviada com sucesso!</div>';
                     unset($_POST);
                    $nome = '';
                    $email = '';
                    $assunto = '';
                    $mensagem = '';
                    endif;                
                    else:            
                        $msg_erros = '';
                        $error_hash = $validator->GetErrors();
                        foreach($error_hash as $inpname => $inp_err):
                           $msg_erros .= "<p> $inp_err</p>\n";
                        endforeach;
                        $msg_form = "<div class='alert alert-warning' role='alert'>{$msg_erros}</div>";
                    endif;          
            else:
       endif;

       $dadosSite = array(
           'metaKeywords' => 'Programação PHP, Sistemas, Sites, Internet, Web, Desenvolvimento, PHP, MYQL, PostgreSql',
           'metaDescription' => 'Pagina de contato  André Marcelino',
           'metaAuthor' => 'André Fauze Marcelino',
           'metaTitle' => 'André Marcelino Desenvolvimento Fale Comigo',
           'pgConteudo' => 'arquivos/vwContato',
           'msg_form' => $msg_form,
           'nome' => $nome,
           'email' => $email,
           'assunto' => $assunto,
           'mensagem' => $mensagem,
           'classAtivo' =>  "Contato",
           'css1' =>  '<link rel="stylesheet" href="'.SITE_URL.'app/public/css/sobre.css" type="text/css" />'
       );       
       
        $view = new RainTPL();
        $view->assign($dadosSite);
        $view->draw('tpl/tpl');//nome da view padrão
    }    
}