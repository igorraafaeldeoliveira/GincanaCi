<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Clientes</title>
    </head>
    <body>
        <h1>Lista de Clientes</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>  
                    <th>Tempo</th>  
                    <th>Número de integrantes</th>   
                    <th>Descrição</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                foreach ($gincanas as $c) {
                    echo '<tr>';
                    echo '<td>' . $c->nome . '</td>';
                    echo '<td>' . $c->rg . '</td>';
                    echo '<td>' . $c->cpf . '</td>';
                    echo '<td>' . '<a href="' . $this->config->base_url()
                    . 'index.php/Gincana/alterar/'
                    . $c->id . '">Alterar </a>' . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
