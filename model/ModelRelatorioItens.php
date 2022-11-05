<?php

    class ModelRelatorioItens{
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

        public static function RetornaJsonEmOrdemCrescente(){
            $json = self::RetornaJsonItens();
            $array = array();
            //organiza em ordem crescente de valor
            foreach($json as $key => $value){
                $array[$key] = $value['valor'];
            }
            array_multisort($array, SORT_ASC, $json);
            return $json;
    }
}


    