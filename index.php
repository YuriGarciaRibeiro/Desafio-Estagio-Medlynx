<?php
    
    if ($_GET != null)  {
        $page = key($_GET);
    }
    else {
        $page = 'relatorio1';
    }
    if ($page == 'relatorio1'){
        require 'controller/ControllerRelatorioMaioresGastos.php';
    }
    if ($page == 'relatorio2'){
        require 'controller/ControllerTelaEscolhaPeriodo.php';
    }
    if ($page == 'relatorio3'){
        require 'controller/ControllerRelatorioDeAlergia.php';
    }
    if ($page == 'relatorio4'){
        require 'controller/ControllerRelatorioDeItens.php';
    }
    if ($page == 'NovaEvolucao'){
        require 'controller/ControllerNovaEvolucao.php';
    }
    if ($page == 'NovaEvolucao2'){
        require 'controller/ControllerNovaAlergia.php';
    }
    if ($page == 'NovoAtendimento'){
        require 'controller/ControllerNovoAtendimento.php';
    }



