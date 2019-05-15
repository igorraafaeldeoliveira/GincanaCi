<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Equipe extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent::__construct();
        //chama o metodo que faz a validção de login de usuario
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->load->model('Equipe_model', 'cm');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['equipes'] = $this->cm->getALL();
        $this->load->view('Header');
        $this->load->view('ListaEquipes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormEquipe');
            $this->load->view('Footer');
        } else {
            $this->load->model('Equipe_model');
            $data = array(
                'nome' => $this->input->post('nome'),
            );
            if ($this->Equipe_model->insert($data)) {
                redirect('Equipe/listar');
            } else {
                redirect('Equipe/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Equipe_model');
            $this->form_validation->set_rules('nome', 'nome', 'required');

            if ($this->form_validation->run() == false) {
                $data['equipe'] = $this->Equipe_model->getONE($id);

                $this->load->view('Header');
                $this->load->view('FormEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                );
                if ($this->Equipe_model->update($id, $data)) {
                    redirect('Equipe/listar');
                } else {
                    redirect('Equipe/alterar/' . $id);
                }
            }
        } else {
            redirect('Equipe/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Equipe_model');
            if ($this->Equipe_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Equipe deletada com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar Equipe...');
            }
        }
        redirect('Equipe/listar');
    }

}
