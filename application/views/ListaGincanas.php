<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Lista Provas</title>
    </head>
    <body>
        <div class="container-expand">
            <nav class="navbar navbar-dark bg-dark navbar-expand-md">
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
                    <i class="fas fa-home"></i>
                    Sistema Provas
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a href="#" id="menuClientes" class="nav-link dropdown-toggle" data-toggle="dropdown">
                             <font color="white">Prova</font> 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuClientes">
                                <a href="<?= $this->config->base_url() . 'Gincana/listar'; ?>" class="dropdown-item">Lista</a>
                                <a href="<?= $this->config->base_url() . 'Gincana/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav justfy-content-end">
                        <li class="nav-item">
                            <a class="nav-link"  href="<?= $this->config->base_url() . 'Usuario/sair'; ?>">
                                <h6><font color="white">Sair</font></h6> 
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <a href="ListaGincanas.php"></a>
            <div class="container-expand">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>"><a href="http://127.0.0.1/GincanaCI/index.php/Gincana/cadastrar">Ir para cadastrar</a></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastro de Provas </li>
                    </ol>
                </nav>

                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
                ?>
            </div>


       


            <h1>Lista de Provas</h1>
            <br>
            <table class='table' border="1">
                <thead class="thead-dark">
                    <tr>


                        <th>Nome</th>  
                        <th>Tempo</th>  
                        <th>Número de integrantes</th>   
                        <th>Descrição</th>
                        <th>Opções</th>

                    </tr> 
                </thead>
                <tbody>
                    <?php
                    foreach ($provas as $c) {
                        echo '<tr>';
                        echo '<td>' . $c->nome . '</td>';
                        echo '<td>' . $c->tempo . '</td>';
                        echo '<td>' . $c->nm_integrantes . '</td>';
                        echo '<td>' . $c->descricao . '</td>';
                        echo '<td>' . '<a href="' . $this->config->base_url()
                        . 'index.php/Gincana/alterar/'
                        . $c->id . '"> <i class="fas fa-pen"></i> Alterar </a>'
                        . ' / '
                        . '<a href="' . $this->config->base_url()
                        . 'index.php/Gincana/deletar/'
                        . $c->id . '"> <i class="fas fa-trash"></i> Deletar </a>'
                        . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
    </body>
</html>
