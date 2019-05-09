<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <title>Lista Provas</title>
    </head>
    <body>
        <div class="container-expand">
            <nav class="navbar navbar-dark bg-dark navbar-expand-md">
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
                    <i class="fas fa-home"></i>
                    Sistema Provas
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a href="#" id="menuProva" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <font color="white">Prova</font> 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuProva">
                                <a href="<?= $this->config->base_url() . 'Gincana/listar'; ?>" class="dropdown-item">Lista</a>
                                <a href="<?= $this->config->base_url() . 'Gincana/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
                            </div>
                        </li>
                        
                          <li class="nav-item dropdown">
                            <a href="#" id="menuEquipe" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <font color="white">Equipes</font> 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuEquipe">
                                <a href="<?= $this->config->base_url() . 'Equipe/listar'; ?>" class="dropdown-item">Lista</a>
                                <a href="<?= $this->config->base_url() . 'Equipe/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
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
        </div>
