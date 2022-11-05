<?php
    class ModelRelatorioPessoasComAlergia{

    public static function RetornaJsonItens(){
        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/itens",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $json = json_decode($response, true);
                return $json;
                }
    }

    public static function RetornaJsonLancamentos(){
        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/lancamentos",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $json = json_decode($response, true);
                return $json;
                }
            
    }

    public static function RetornaJsonAtendimentos(){
        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/atendimentos",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $json = json_decode($response, true);
                return $json;
                }
            }
        
    public static function RetornaJsonPessoas(){
        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/pessoas",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $json = json_decode($response, true);
                return $json;
                }
            }
    
    public static function RetornaJsonEvolucoes(){
        $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/evolucao",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $json = json_decode($response, true);
                return $json;
                }
            }

    
        
    
    public static function gerarArrayDosAlercios(){
        $evolucoes = self::RetornaJsonEvolucoes();
        $pessoas = self::RetornaJsonPessoas();
        $atendimentos = self::RetornaJsonAtendimentos();
        $lançamentos = self::RetornaJsonLancamentos();
        $itens = self::RetornaJsonItens();
    
        
        //gerar array com pessoas que tem alergia
        $evolucoesComAlergia = array();
        foreach($evolucoes as $evolucao){
            if($evolucao['descricao'] == 'reação alérgica grave'){
                array_push($evolucoesComAlergia, $evolucao);
            }
        }
    
        //gerar array com pessoas que tem alergia
        $atendimentosComAlergia = array();
        foreach($evolucoesComAlergia as $evolucao){
            foreach($atendimentos as $atendimento){
                if($evolucao['id_atendimento'] == $atendimento['id_atendimento']){
                    array_push($atendimentosComAlergia, $atendimento);
                }
            }
        }
    
        //gerar array com lançamentos das consultas que tiveram alergia
        $lancamentosComAlergia = array();
        foreach($atendimentosComAlergia as $atendimento){
            foreach($lançamentos as $lançamento){
                if($atendimento['id_atendimento'] == $lançamento['id_atendimento']){
                    array_push($lancamentosComAlergia, $lançamento);
                }
            }
        }
    
        //gerar array com remedios que tiveram alergia
        $remediosComAlergia = array();
        foreach($lancamentosComAlergia as $lançamento){
            foreach($itens as $item){
                if($lançamento['id_item'] == $item['id_item']){
                    array_push($remediosComAlergia, $item['descricao']);
                }
            }
        }
    
        //remedio mais usado
        $remediosUsados = array_count_values($remediosComAlergia);
        $remedioMaisUsado = array_search(max($remediosUsados), $remediosUsados);
    
        //gerar array com relatorios
        $relatorios = array();
        foreach($pessoas as $pessoa){
            foreach($atendimentosComAlergia as $atendimento){
                if($pessoa['id_pessoa'] == $atendimento['id_pessoa']){
                    //formatar data
                    $data = date_create($atendimento['data_atendimento']);
                    $dataFormatada = date_format($data, 'd/m/Y');



                    $relatorio = array(
                        'id_pessoa' => $pessoa['id_pessoa'],
                        'nome' => $pessoa['nome'],
                        'id_atendimento' => $atendimento['id_atendimento'],
                        'remedio' => $remedioMaisUsado,
                        'data' => $dataFormatada
                    );
                    array_push($relatorios, $relatorio);
                }
            }
        }
    
        $return = array(
            'relatorios' => $relatorios,
            'remedioMaisUsado' => $remedioMaisUsado
        );
    
    
    
        return $return;
    
    
    
    
    
    }
    
    }


    
    