<?php 


    class TelaDeRelatoriosMaioresGastos{
        public static function output($maioresValores){
            //gera a página com os dados do relatório
            $output = '
                    <div class="w-100 my-5">
                    <div class="container ">
                <div class="row ">
                    <div class="col-12">
                        <h1 >Maiores Gastos</h1>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Data</th>
                                <th scope="col">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                            ';

                        foreach ($maioresValores as $key => $value) {
                                $output .= '
                                <tr>
                                    <th scope="row">'.$value['id_item'].'</th>
                                    <td>'.$value['descricao'].'</td>
                                    <td> R$ '.$value['valor'].'</td>
                                </tr>
                                ';
                            }
                            $output .= '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </body>
            </html>
            ';
            return $output;
            
        }
    }