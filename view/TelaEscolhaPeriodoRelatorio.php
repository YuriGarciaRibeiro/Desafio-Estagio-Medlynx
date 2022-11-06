<?php
    class TelaEscolhaPeriodoRelatorio{
        public function output(){

            //gera a página para inserir o ano desejado
            $output = '
            <div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1>Escolha o Período</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="../controller/ControllerRelatorioPorPeriodo.php" method="GET">
                <div class="form-group">
                    <label for="ano my-2">Ano</label>
                    <input type="number" class="form-control my-2" name="ano" id="ano" placeholder="Ano">
                    <input type="submit" class="btn btn-outline-success my-2" value="Gerar Relatório">
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>
            '
            ;
            return $output;
        }

    }
