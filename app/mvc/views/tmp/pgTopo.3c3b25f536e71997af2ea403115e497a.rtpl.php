<?php if(!class_exists('raintpl')){exit;}?>    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php  echo SITE_URL;?>">AndréWeb</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if( $classAtivo=='Sobre' ){ ?>active<?php } ?>"><a href="Sobre">Sobre</a></li>
<!--            <li><a href="#about">Portfolio</a></li>-->
              <li class="<?php if( $classAtivo=='Contato' ){ ?>active<?php } ?>"><a href="Contato">Contato</a></li>
            <li class="dropdown">
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>