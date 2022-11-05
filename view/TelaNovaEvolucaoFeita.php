<?php
    class TelaNovaEvolucaoFeita{
        public function output(){
            $output = '
            <div class="container my-5 ">
                <h1 class="my-5">Nova Evolução Feita com sucesso</h1>
                <div class="row">
                    <div class="col-12 my-2">
                        <h1>Novo evolucao cadastrada com sucesso</h1>
                        <a href="http://localhost/index.php?NovaEvolucao=">
                            <button class="btn btn-outline-success my-2" >Voltar</button>
                        </a>
                    </div>
            </div>

            ';
            return $output;
        }
    }