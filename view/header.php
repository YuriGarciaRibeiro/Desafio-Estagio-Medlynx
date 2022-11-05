<?php

    // Get the header
    class header{
        public function output() {
            $output = '<!doctype html>
            <html lang="pt-br" class="h-100 d-inline-block">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Dr. Magnovaldo</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
              </head>
              <body class="w-100 h-100 d-inline-block" >
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">Dr. Magnovaldo</a>
              <div class="collapse navbar-collapse" id="navbarNav">
                <form class="ml-3" method="GET" action="../index.php">
                  <button class="btn btn-outline-success mx-3 px-3" type="submit" name="relatorio1">Relatorio maiores Gastos</button>
                  <button class="btn btn-outline-success mx-3 px-3" type="submit" name="relatorio2">Relatorio por periodo</button>
                  <button class="btn btn-outline-success mx-3 px-3" type="submit" name="relatorio3">Relatorio Alergia</button>
                  <button class="btn btn-outline-success mx-3 px-3" type="submit" name="relatorio4">Itens Cadastrados no sistema</button>
                  <button class="btn btn-outline-success mx-3 px-3" type="submit" name="NovaEvolucao">Novas Evoluções</button>
                  <button class="btn btn-outline-success mx-3 px-3 " type="submit" name="NovoAtendimento">Novos Atendimentos</button>
                </form>
              </div>
            </nav>';
            return $output;
        }
    }