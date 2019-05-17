<a href="ListaEquipes.php"></a>
<div class="container-expand">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url().'Equipe/cadastrar'; ?>">Ir para cadastrar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Equipes </li>
        </ol>
    </nav>

    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
    ?>
</div>

 <h1 style="text-align:center;">Lista de Equipe</h1>

 <br>
<div class="table-responsive">
    <table class='table ' border="1">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>  
                <th>Imagens</th>
                <th>Opções</th>  
            </tr> 
        </thead>

        <tbody>    
            <?php
            foreach ($equipes as $c) {
                echo '<tr>';
                echo '<td>' . $c->nome . '</td>';
                echo '<td>' . $c->imagem . '</td>';
                echo '<td>' . '<a href="' . $this->config->base_url()
                . 'Equipe/alterar/'
                . $c->id . '"> <i class="fas fa-pen"></i> Alterar </a>'
                . ' / '
                . '<a href="' . $this->config->base_url()
                . 'Equipe/deletar/'
                . $c->id . '"> <i class="fas fa-trash"></i> Deletar </a>'
                . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
