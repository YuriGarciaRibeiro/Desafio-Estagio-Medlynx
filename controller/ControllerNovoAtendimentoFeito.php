<?php 

    if(isset($_POST['id_pessoa']) && isset($_POST['data'])  && $_POST['id_pessoa'] != "" && $_POST['data'] != "" ){
        
        



        $dataHora = $_POST['data'];
        $data = $dataHora[8] . $dataHora[9] . "/" . $dataHora[5] . $dataHora[6] . "/" . $dataHora[0] . $dataHora[1] . $dataHora[2] . $dataHora[3];
        $hora = $dataHora[11].$dataHora[12].":".$dataHora[14].$dataHora[15].":00";
        $data = $data." ".$hora;
        
        $itens = array();
        foreach($_POST as $key => $value){
            if($_POST[$key] == 'on'){
                array_push($itens, array('id_item' => strval($key),
                'quantidade' => $_POST['quantia'.$key]));
            } 
            };


        $dados = array(
            'id_pessoa' => $_POST['id_pessoa'] ,
            'data_atendimento' => $data,
            "itens"=> $itens
        );
        

        
        
        
        require '../model/ModelRegistroNovoAtendimento.php';
        $resultado = new NovoAtendimento();
        $validar = $resultado->PostNovoAtendimento($dados);

        if ($validar == true){
            require '../view/TelaNovoAtendimentoFeito.php';
            require '../view/page.php';

            $telaNovoAtendimentoFeito = new TelaNovoAtendimentoFeito();
            $telaNovoAtendimentoFeito = $telaNovoAtendimentoFeito->output();
            $page = new page();
            $page = $page->output($telaNovoAtendimentoFeito);
            echo $page;
        }
        else{
            require '../view/TelaErroCadastroNovoAtendimentoDadosErrados.php';
            require '../view/page.php';
            $telaErroCadastroNovoAtendimentoDadosErrados = new TelaErroAtendimento();
            $telaErroCadastroNovoAtendimentoDadosErrados = $telaErroCadastroNovoAtendimentoDadosErrados->output();
            $page = new page();
            $page = $page->output($telaErroCadastroNovoAtendimentoDadosErrados);
            echo $page;
            
        }
}
else{
    require '../view/TelaErroCadastroAtendiementonNaoPreenchidos.php';
    require '../view/page.php';
    $tela = new TelaErroAtendimento();
    $tela = $tela->output();
    $page = new page();
    $page = $page->output($tela);   
    echo $page;
}