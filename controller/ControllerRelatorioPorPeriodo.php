<?php   
        $ano = $_GET['ano'];
        require '../model/ModelRelatoriaPorPeriodo.php';
        $relatorio = new ModelRelatorioPorPeriodo();
        $relatorio = $relatorio->gerarArrayDosRelatorios($ano);
        require '../view/TelaDeRelatoriosPorPeriodo.php';
        $telaRelatorio = new telaRelatoriosPorPeriodo();
        $telaRelatorio = $telaRelatorio->output($relatorio);
        require '../view/page.php';
        $page = new page();
        $page = $page->output($telaRelatorio);
        echo $page;
        