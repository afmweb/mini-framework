<?php if(!class_exists('raintpl')){exit;}?><div class="container margin-topo50">    <div class="row">        <div class="col-xs-12">            <section class="main">                                <br><h2>Fale Comigo</h2><br><?php echo $msg_form;?>                <form name="frm-contato" action="Contato" method="post" role="form">                    <div class="form-group">                        <?php echo Frm::inputLabel("nome"); ?>                        <?php echo Frm::inputText("nome", "", array("class"=>"form-control", "placeholder"=>"Informe seu nome") ); ?>                    </div>                    <div class="form-group">                        <?php echo Frm::inputLabel("email"); ?>                        <?php echo Frm::inputEmail("email", "", array("class"=>"form-control", "placeholder"=>"Informe seu email") ); ?>                    </div>                    <div class="form-group">                        <?php echo Frm::inputLabel("assunto"); ?>                        <?php echo Frm::inputText("assunto", "", array("class"=>"form-control", "placeholder"=>"Informe o assunto") ); ?>                    </div>                    <div class="form-group">                        <?php echo Frm::inputLabel("mensagem"); ?>                        <?php echo Frm::inputTextArea("mensagem", "", array("class"=>"form-control", "placeholder"=>"Informe sua mensagem") ); ?>                    </div>                    <?php echo Frm::inputButton("Enviar Mensagem", array("class"=>"btn btn-default btn-lg", "placeholder"=>"Informe sua mensagem") ); ?>                </form>            </section>        </div>    </div></div><div class="margin-bottom80"></div>