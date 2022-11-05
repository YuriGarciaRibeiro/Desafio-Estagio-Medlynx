<?php 
    require 'view/TelaNovoAtendimento.php';
    require 'view/page.php';
    require 'model/ModelRegistroNovoAtendimento.php';
    $model = new NovoAtendimento();
    $tela = new TelaNovoAtendimento();
    $tela = $tela->output($model->RetornaJsonItens());
    $page = new page();
    $page = $page->output($tela);
    echo $page;
    