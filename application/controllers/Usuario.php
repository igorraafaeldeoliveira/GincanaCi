<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index() {
        $this->load->view('Login');
    }

    public function login() {

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Login');
        } else {
            $this->load->model('Usuario_model');
            //Busca no banco de dados, atraves do model, saber se existe o usuario com este email e senha recebidos por post
            $usuario = $this->Usuario_model->getUsuario(
                    $this->input->post('email'), $this->input->post('senha')
            );
            //valida se retornou algum registro, quer dizer que o usuário é existente
            if ($usuario) {
                $data = array(
                    'idUsuario' => $usuario->id,
                    'email' => $usuario->email,
                    'logado' => TRUE
                );
                //Mandamos o codeigniter salvar na sessão os dados do usuario 
                //perceba que o metodo set_userdata é diferente do metodo
                //set_flashdata pois ele salvo dados permanentes enquanto durar a sessao
                $this->session->set_userdata($data);
                //abre a pagina principal do sistema  
                redirect($this->config->base_url());
            } else {
                $this->session->set_flashdata('mensagem', 'Usuário e Senha INCORRETOS!');
                //redireciona obrigando o login
                redirect($this->config->base_url() . 'Usuario/login');
            }
        }
    }

    //Metodo responsavel por fazer o logout do sistema destruindo a sessão do usuário
    public function sair() {
        //apaga todo o conteudo da sessao do usuario
        $this->session->sess_destroy();
        redirect($this->config->base_url());
    }

}
