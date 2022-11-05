<?php

    if(isset($_POST['data']) && isset($_POST['id_atendimento']) && isset($_POST['descricao']) && $_POST['data'] != "" && $_POST['id_atendimento'] != "" && $_POST['descricao'] != "")
    {
    

        
        $dataHora = $_POST['data'];
        $datA = substr($dataHora, 0, 10);
        $data = str_replace('-','/',$datA);
        $hora = $dataHora[11].$dataHora[12].":" .$dataHora[16].$dataHora[17].":00";
        
        $dados = array(
            'id_atendimento' =>$_POST['id_atendimento'] ,
            'data' => $data." ".$hora,
            "descricao"=> $_POST['descricao']
        );
        require '../model/ModelRegistroNovaEvolucao.php';
        $resultado = new NovaEvolucao();
        $validar = $resultado->PostNovaEvolucao($dados);

        
        if ($validar == true){
            require '../view/TelaNovaEvolucaoFeita.php';
            require '../view/page.php';
            

            $telaNovaEvolucaoFeita = new TelaNovaEvolucaoFeita();
            $telaNovaEvolucaoFeita = $telaNovaEvolucaoFeita->output();
            $page = new page();
            $page = $page->output($telaNovaEvolucaoFeita);
            echo $page;

        }else{
            require '../view/TelaErroCadastroNovaEvoluçãoDadosErrados.php';
            require '../view/page.php';
            $telaErroCadastroNovaEvoluçãoDadosErrados = new TelaErroEvolucoes();
            $telaErroCadastroNovaEvoluçãoDadosErrados = $telaErroCadastroNovaEvoluçãoDadosErrados->output();
            $page = new page();
            $page = $page->output($telaErroCadastroNovaEvoluçãoDadosErrados);
            echo $page;

        }
}else{
    require '../view/ErroCadastroEvolução.php';
    require '../view/page.php';
    $tela = new TelaErroEvolucoes();
    $tela = $tela->output();
    $page = new page();
    $page = $page->output($tela);   
    echo $page;
}


