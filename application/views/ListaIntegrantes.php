<a href="ListaEquipes.php"></a>
<div class="container-expand">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>"><a href="http://127.0.0.1/GincanaCI/index.php/Gincana/cadastrar">Ir para cadastrar</a></a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Equipe </li>
        </ol>
    </nav>

    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
    ?>
</div>

<h1>Lista de Provas</h1>
<br>
<div class="table-responsive">
<table class='table' border="1">
    <thead class="thead-dark">
        <tr>
            <th>Nome:</th>  
            <th>Nome da equipe:</th>  
            <th>RG:</th>   
            <th>CPF:</th>
            <th>Data de nascimento:</th>
            <th>Opções</th>

        </tr> 
    </thead>
    <tbody>
        <?php
        foreach ($integrantes as $c) {
            echo '<tr>';
            echo '<td>' . $c->nome . '</td>';  
            echo '<td>' . $c->nomeIntegrante . '</td>';
            echo '<td>' . $c->rg . '</td>';
            echo '<td>' . $c->cpf . '</td>';
            echo '<td>' . $c->data_nasc . '</td>';
            echo '<td>' . '<a href="' . $this->config->base_url()
            . 'Integrante/alterar/'
            . $c->id . '"> <i class="fas fa-pen"></i> Alterar </a>'
            . ' / '
            . '<a href="' . $this->config->base_url()
            . 'Integrante/deletar/'
            . $c->id . '"> <i class="fas fa-trash"></i> Deletar </a>'
            . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
     </div>
</body>
</html>
