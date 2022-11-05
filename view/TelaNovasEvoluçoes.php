<?php 

    class TelaNovaEvolução
    {
        public function output(){
            $output = '
            <div class="container my-5">
            <h1>Nova Evolução</h1>
            <form action="../controller/ControllerNovaEvolucaoFeita.php" method="POST">
            <div class="form-group">
                <label class="my-2">Descrição</label>
                <textarea class="form-control my-2" rows="3" name="descricao"></textarea>
                <small id="emailHelp" class="form-text text-muted my-2">Descrição sobre a evolução</small>
            </div>
            <div class="form-group">
                <label class="my-2">ID Do Atendimento</label>
                <input  class="form-control my-2"  placeholder="ID" name="id_atendimento">
            </div>
            <div class="form-group">
                <label class="my-2">Data e Hora</label>
                <input type="datetime-local" class="form-control my-2"  placeholder="ID" name="data">
            </div>
            
            <button type="submit" class="btn btn-outline-success my-2">Salvar</button>
            </form>
            </div>
            
            ';
            return $output;
        }



    }