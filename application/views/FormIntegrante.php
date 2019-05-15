<div class="container-expand ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url().'Integrante/listar'; ?>">Ir para lista</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Integrantes </li>
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
                <font color=""> <h3>Cadastro de Integrante</h3> </font>

                <form action = "" method = "post">
                    <input type = "hidden" name = "id" value = "<?= (isset($cliente)) ? $cliente->id : ''; ?>">


                    <div class = "form-group">
                        <label for = "nome"> Nome:</label>
                        <input type = "text" class = "form-control" name = "nome" id = "nome" value = "<?= (isset($integrante)) ? $integrante->nome : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <label for = "data_nasc">Data de nascimento:</label>
                        <input type = "date" class = "form-control" name = "data_nasc" id = "data_nasc" value = "<?= (isset($integrante)) ? $integrante->data_nasc : ''; ?>">
                    </div>
                    <div class = "form-group">
                        <label for = "rg"> RG:</label>
                        <input type = "text" class = "form-control" name = "rg" id = "rg" value = "<?= (isset($integrante)) ? $integrante->rg : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <label for = "cpf"> CPF:</label>
                        <input type = "text" class = "form-control" name = "cpf" id = "cpf" value = "<?= (isset($integrante)) ? $integrante->cpf : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <select class="form-control" name="id_equipe">
                            <option>Selecione a equipe pertencente</option>

                            <?php
                            foreach ($integrantes as $i) {
                                echo '<option value='. $i->id .' >'. $i->nome.'</option>';
                            }
                            ?>
                        </select>
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
