<?php 
        require 'view/TelaEscolhaPeriodoRelatorio.php';
        $telaRelatorio = new TelaEscolhaPeriodoRelatorio();
        $telaRelatorio = $telaRelatorio->output();
        require 'view/page.php';
        $page = new page();
        $page = $page->output($telaRelatorio);
        echo $page;
    