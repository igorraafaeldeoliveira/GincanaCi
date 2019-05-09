<?php

/*
 * Class model da tabela usuario do db
 * 
 * @author Igor 
 *  */

//Metodo que busca o usuario no banco de dados recebe como parametro o email e a senha

class Usuario_model extends CI_Model {

    public function getUsuario($email, $senha) {
        $this->db->where('email', $email);     // concatena a senha
        //com mais um codigo ai depois o sha1  VVVV        
        $this->db->where('senha', sha1($senha . 'igorSENAC'));

        $query = $this->db->get('usuario');
        return $query->row(0);
    }

    //metodo que valida na sessao se o usuario esta logado
    public function verificaLogin() {
        //resgata na sessao o status logado e o id do usuario
        $logado = $this->session->userdata('logado');
        $idUsuario = $this->session->userdata('idUsuario');
        //verifica se o status esta setado ou nao esta true ou nao tem idUsuario
        if ((!isset($logado)) || ($logado != true) || ($idUsuario <= 0)) {
            //redireciona obrigando o login
            redirect($this->config->base_url() . 'Usuario/login');
        }
    }

}
