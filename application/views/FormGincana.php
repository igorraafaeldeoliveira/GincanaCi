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

        <title>Cadastro de provas</title>
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
                                <a href=" <?= $this->config->base_url() . 'Gincana/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
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

            <div class="container-expand ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Ir para lista</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastro de Provas </li>
                    </ol>
                </nav>

                <?php
                $mensagem = $this->session->flashdata('mensagem');
                echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
                ?>
            </div>

        </div>



        <br>

        <div class="container">
            <div class = "row-md-4">   
                <div  class = " card-header col-6 offset-md-3 ">
                    <div>
                        <h3>Cadastro de provas</h3>

                        <form action = "" method = "post">
                            <input type = "hidden" name = "id" value = "<?= (isset($cliente)) ? $cliente->id : ''; ?>">

 
                            <div class = "form-group">
                                <label for = "nome"> Nome:</label>
                                <input type = "text" class = "form-control" name = "nome" id = "nome" value = "<?= (isset($prova)) ? $prova->nome : ''; ?>">
                            </div>

                            <div class = "form-group">
                                <label for = "descricao">Descrição:</label>
                                <input type = "text" class = "form-control" name = "descricao" id = "descricao" value = "<?= (isset($prova)) ? $prova->descricao : ''; ?>">
                            </div>
                            <div class = "form-group">
                                <label for = "nm_integrantes"> Número de integrantes:</label>
                                <input type = "text" class = "form-control" name = "nm_integrantes" id = "nm_integrantes" value = "<?= (isset($prova)) ? $prova->nm_integrantes : ''; ?>">
                            </div>

                            <div class = "form-group">
                                <label for = "tempo"> Tempo:</label>
                                <input type = "text" class = "form-control" name = "tempo" id = "tempo" value = "<?= (isset($prova)) ? $prova->tempo : ''; ?>">
                            </div>

                            <button type = "submit" class = "btn btn-success">Enviar</button>
                            <button type = "reset" class = "btn btn-danger">Limpar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
