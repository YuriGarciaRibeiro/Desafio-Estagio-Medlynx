<?php

    class NovaEvolucao{
        public function PostNovaEvolucao($dados){
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://comercial.medlynx.com.br/api_devtests2022_2/api/evolucao/new",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $dados,
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
}