<?php

    require 'model/ModelRelatorioPessoaComAlergia.php';
    require 'view/TelaDeRelatorioAlergia.php';
    require 'view/page.php';

    $ModelRelatorioDeAlergia = new ModelRelatorioPessoasComAlergia();
    $alergias = $ModelRelatorioDeAlergia->gerarArrayDosAlercios();

    $telaRelatorio = new TelaDeRelatorioDeAlergia();
    $telaRelatorio = $telaRelatorio->output($alergias['relatorios'], $alergias['remedioMaisUsado']);

    $page = new page();
    $page = $page->output($telaRelatorio);
    echo $page;
