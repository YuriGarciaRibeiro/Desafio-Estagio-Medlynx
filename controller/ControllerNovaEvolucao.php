<?php   

    require 'view/TelaNovasEvoluçoes.php';
    require 'view/page.php';
    $tela = new TelaNovaEvolução();
    $tela = $tela->output();
    $page = new page();
    $page = $page->output($tela);   
    echo $page;