<?php

    class TelaNovoAtendimentoFeito{
        public function output(){
            $output = '
            <div class="container my-5 ">
                <h1 class="my-5">Novo Atendimento cadastrado com sucesso</h1>
                <div class="row">
                    <div class="col-12 my-2">
                        <a href="http://localhost/index.php?NovoAtendimento=">
                            <button class="btn btn-outline-success my-2" >Voltar</button>
                        </a>
                    </div>
            </div>

            ';
            return $output;
        }

    }