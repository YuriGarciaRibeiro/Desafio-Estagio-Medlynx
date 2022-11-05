<?php

    require 'model/ModelRelatorioItens.php';
    require 'view/TelaDeRelatorioItens.php';
    require 'view/page.php';
    $ModelRelatorioItens = new ModelRelatorioItens();
    $itens = $ModelRelatorioItens->RetornaJsonEmOrdemCrescente();
    $telaRelatorio = new TelaDeRelatorioItens();
    $telaRelatorio = $telaRelatorio->output($itens);
    $page = new page();
    $page = $page->output($telaRelatorio);
    echo $page;
