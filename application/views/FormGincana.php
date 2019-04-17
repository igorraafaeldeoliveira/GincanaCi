<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de provas</title>
    </head>
    <body>
        <h1>Cadastro de provas</h1>
        <form name="participante" method="POST" action="">
            <input type="hidden" name="id" value="<?= (isset($prova)) ? $prova['id'] : ''; ?>">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?= (isset($prova)) ? $prova['nome'] : ''; ?>">
            <br>
            <label for="descricao">descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= (isset($prova)) ? $prova['descricao'] : ''; ?>">
            <br>
            <label for="nm_integrantes">Número de integrantes:</label>
            <input type="text" name="nm_integrantes" id="nm_integrantes" value="<?= (isset($prova)) ? $prova['nm_integrantes'] : ''; ?>">
            <br>
            <label for="tempo">Tempo:</label>
            <input type="text" name="tempo" id="tempo" value="<?= (isset($prova)) ? $prova['tempo'] : ''; ?>">
            <br><br>
            <button type="submit">Enviar</button>
            <button type="reset">Cancelar</button>
        </form>
    </body>
</html>
