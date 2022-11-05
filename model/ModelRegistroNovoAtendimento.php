<?php

    class NovoAtendimento{


        public function PostNovoAtendimento($dados){
            $curl = curl_init();


            
            $dados = str_replace('\\', '', json_encode($dados));
            

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/atendimentos/new",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
                CURLOPT_POSTFIELDS => $dados
                
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            $condicao = ($response[12].$response[13].$response[14].$response[15]);
            
            
            


            curl_close($curl);
            
            if ($condicao == "true") {
                return true;
            } else {
                return false;
        }
    }

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

    }
