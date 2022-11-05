<?php
            require 'model/ModelRelatorioMaioresGastos.php';
            require 'view/TelaDeRelatoriosMaioresGastos.php';
            require 'view/page.php';
            $ModelRelatorioMaioresGastos = new ModelRelatorioMaioresGastos();
            $maioresValores = $ModelRelatorioMaioresGastos->getMaioresGastos();
            $telaRelatorio = new TelaDeRelatoriosMaioresGastos();
            $telaRelatorio = $telaRelatorio->output($maioresValores);
            $page = new page();
            $page = $page->output($telaRelatorio);
            echo $page;
