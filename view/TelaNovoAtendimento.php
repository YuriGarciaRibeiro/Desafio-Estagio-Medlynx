<?php 

    class TelaNovoAtendimento
    {


        public function output($itens){
            $output = '
            <div class="container my-5">
            <h1>Novo Atendimento</h1>
            <form action="../controller/ControllerNovoAtendimentoFeito.php" method="POST">
            <div class="form-group">
                <label class="my-2">ID Da Pessoa</label>
                <input  class="form-control my-2"  placeholder="ID" name="id_pessoa">
            </div>
            <div class="form-group">
                <label class="my-2">Data e Hora</label>
                <input type="datetime-local" class="form-control my-2"  placeholder="ID" name="data">
            </div>
            
            
            <label class="my-2">Itens: </label>
            ';

          

            foreach($itens as $keys => $value){
                $output .= '
                
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="'.$value['id_item'].'" name="'.$value['id_item'].'">
                <label class="custom-control-label" for="'.$value['id_item'].'">'.'ID:'.$value['id_item'] .'     Descrição: ' .$value['descricao'].'</label>
                </div>
                <div class="form-group">
                <label for="quantia">Quantidade: </label>
                <select class="form-control" id="quantia" name="quantia'.$value['id_item'].'">
                    <option>0</option>
                    <option value="1" name="quantia'.$value['id_item'].'">1</option>
                    <option value="2" name="quantia'.$value['id_item'].'">2</option>
                    <option value="3" name="quantia'.$value['id_item'].'">3</option>
                    <option value="4" name="quantia'.$value['id_item'].'">4</option>
                    <option value="5" name="quantia'.$value['id_item'].'">5</option>
                </select>
                </div>
                
                
                
                ';
            }
            $output .= '
            <button type="submit" class="btn btn-outline-success my-3">Salvar</button>
            </form>
            </div>
            ';
            return $output;
        }



    }