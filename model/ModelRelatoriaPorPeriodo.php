<?php
    class ModelRelatorioPorPeriodo{
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


        public function gerarArrayDosRelatorios($periodo){
            $relatorios = array();


            $atendimentos = self::RetornaJsonAtendimentos();
            $lancamentos = self::RetornaJsonLancamentos();
            $itens = self::RetornaJsonItens();
            $pessoas = self::RetornaJsonPessoas();

            foreach($atendimentos as $key => $value){
                //descobre o ano do atendimento
                $ano = substr($value['data_atendimento'], 0, 4);
                $relatorio = array();
                if($ano == $periodo){

                    //descobre o lancamento do atendimento
                    $lancamentO = null;
                    foreach($lancamentos as $key2 => $lancamento){
                        if($lancamento['id_atendimento'] == $value['id_atendimento']){
                            $lancamentO = $lancamento;
                        }
                    }

                    //descobre o item do lancamento
                    $iteM = null;
                    if ($lancamentO != null){
                        foreach($itens as $key3 => $item){
                            if($item['id_item'] == $lancamentO['id_item']){
                                $iteM = $item;
                            }
                        }
                    }
                    

                    //descobre a pessoa do atendimento
                    $pessoA = null;
                    foreach($pessoas as $key4 => $pessoa){
                        if($pessoa['id_pessoa'] == $value['id_pessoa']){
                            $pessoA = $pessoa;
                        }
                    }

                    
                    

                    //formatar data
                    $data = $value['data_atendimento'];
                    $data = substr($data, 8, 2)."/".substr($data, 5, 2)."/".substr($data, 0, 4);
                    
                    $relatorio = array(
                        'id_atendimento' => $value['id_atendimento'],
                        'data_atendimento' => $data,
                        'nome_cliente' => $pessoA['nome'],
                        'nome_item' => $iteM != null ? $iteM['descricao'] : 'Não foi usado nenhum item',
                        'valor_item' => $iteM != null ? $iteM['valor'] : 'Não foi usado nenhum item',
                        'quantidade' => $iteM != null ? $lancamento['quantidade'] : 'Não foi usado nenhum item',
                        'valor_lancamento' => $lancamentO != null ? $lancamentO['quantidade'] * $iteM['valor'] : 'Não foi usado nenhum item',
                        'id_lancamento' => $lancamentO != null ? $lancamentO['id_lancamento'] : 'Não foi usado nenhum item',
                    );
                    array_push($relatorios, $relatorio);
            }
            
        }
        return $relatorios;
    }   
}

    