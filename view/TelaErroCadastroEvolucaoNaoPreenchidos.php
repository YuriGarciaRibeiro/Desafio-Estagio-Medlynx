<?php

    class TelaErroEvolucoes{

        public function output(){
            $output = '
            <div class="container my-5 ">
                <h1 class="my-5">
                    Erro!!
                </h1>
                <div class="row">
                    <div class="col-12 my-2">
                        <h1>Erro ao cadastrar nova evolução</h1>
                        <h2>Campo Não Preenchido</h2>
                        <a href="http://localhost/index.php?NovaEvolucao=">
                            <button class="btn btn-outline-success my-2" >Voltar</button>
                        </a>
                    </div>
            </div>
                ';
            return $output;
        }
    }