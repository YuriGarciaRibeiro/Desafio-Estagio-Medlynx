<?php

    class ModelRelatorioMaioresGastos
    {
        
        public function getMaioresGastos()
        {
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
    $maioresValores = array();
    

    foreach ($json as $key => $value) {
        if($value['id_item'] <= 5){
            array_push($maioresValores, $value);
        }else{
            if(min($maioresValores)['valor'] < $value['valor']){
                $min = min($maioresValores);
                $minIndex = array_search($min, $maioresValores);
                $maioresValores[$minIndex] = $value;
            }
            }
        }
        
    }

    //ordena o array de maiores valores
    usort($maioresValores, function($a, $b) {
        return $a['valor'] <=> $b['valor'];
    });

    //inverte o array para que o maior valor fique no topo
    $maioresValores = array_reverse($maioresValores);

    return $maioresValores;
        }
    }


    