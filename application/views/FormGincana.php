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
