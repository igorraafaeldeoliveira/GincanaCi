<div class="container-expand ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url() . 'Equipe/listar'; ?>">Ir para lista</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Equipe</li>
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
                <h3>Cadastro de Equipes</h3>

                <form action = "" method = "post" enctype="multipart/form-data">
                    <input type = "hidden" name = "id" value = "<?= (isset($equipe)) ? $equipe->id : ''; ?>">
                    <div class = "form-group">
                        <label for = "nome"> Nome:</label>
                        <input type = "text" class = "form-control" name = "nome" id = "nome" value = "<?= (isset($equipe)) ? $equipe->nome : ''; ?>">
                    </div>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input  name="imagem" type="file" class="custom-file-input" id="imagem" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="imagem">Escolha a logomarca da equipe</label>
                        </div>
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
