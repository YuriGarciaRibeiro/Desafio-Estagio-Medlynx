<?php

    class telaRelatoriosPorPeriodo{
        public static function output($dadosDoPeriodo){
            //gera a página com os dados do relatório
            
            $output = '
                    <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <h1>Consultas no periodo</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome Cliente</th>
                                <th scope="col">Nome Item</th>
                                <th scope="col">Valor Item</th>
                                <th scope="col">Quantidade Item/th>
                                <th scope="col">Valor do Lançamento</th>
                                <th scope="col">ID lançamento</th>
                                <th scope="col">Data do Atendimento</th>
                                </tr>
                            </thead>
                            <tbody>
                            ';

                        foreach ($dadosDoPeriodo as $key => $value) {
                                $output .= '
                                <tr>
                                    <th scope="row">'.$value['id_atendimento'].'</th>
                                    <td>'.$value['nome_cliente'].'</td>
                                    <td> '.$value['nome_item'].'</td>
                                    <td> '.$value['valor_item'].'</td>
                                    <td> '.$value['quantidade'].'</td>
                                    <td> R$ '.$value['valor_lancamento'].'</td>
                                    <td> '.$value['id_lancamento'].'</td>
                                    <td> '.$value['data_atendimento'].'</td>

                                </tr>
                                ';
                            }
                            $output .= '
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </body>
            </html>
            ';
            return $output;
        }
    }