<?php 

    class TelaDeRelatorioDeAlergia{
        public static function output($alergias,$remedio){
            //gera a página com os dados do relatório
            $output = '
                    <div class="container my-5">
                <div class="row ">
                    <div class="col-12">
                        <h1 >Relatorio De Alergiaas</h1>
                        <h2>Remédio que mais causou atergias: '.$remedio.'</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID Pessoa</th>
                                <th scope="col">Nome Pessoa</th>
                                <th scope="col">ID Atendimento</th>
                                <th scope="col">Remedio</th>
                                <th scope="col">Data Atendimento</th>
                                </tr>
                            </thead>
                            <tbody>
                            ';

                        foreach ($alergias as $key => $value) {
                                $output .= '
                                <tr>
                                    <th scope="row">'.$value['id_pessoa'].'</th>
                                    <td>'.$value['nome'].'</td>
                                    <td>  '.$value['id_atendimento'].'</td>
                                    <td>  '.$value['remedio'].'</td>
                                    <td>  '.$value['data'].'</td>
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