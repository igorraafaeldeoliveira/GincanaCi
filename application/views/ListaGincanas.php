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
<div class="table-responsive">
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
     </div>
</body>
</html>
