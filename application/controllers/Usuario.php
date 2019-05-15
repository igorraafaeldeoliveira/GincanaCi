<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    public function __construct() {
        parent :: __construct();
        $this->load->model('Usuario_model');
    }

    
    public function index() {
        $this->load->view('Login');
    }

    public function login() {

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Login');
        } else {
            $usuario = $this->Usuario_model->getUsuario(
                    $this->input->post('email'), $this->input->post('senha')
            );
            if ($usuario) {
                $data = array(
                    'idUsuario' => $usuario->id,
                    'email' => $usuario->email,
                    'logado' => TRUE
                );
                $this->session->set_userdata($data);
                redirect($this->config->base_url());
            } else {
                $this->session->set_flashdata('mensagem', 'Usuário e Senha INCORRETOS!');
                redirect($this->config->base_url() . 'Usuario/login');
            }
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect($this->config->base_url());
    }

}
