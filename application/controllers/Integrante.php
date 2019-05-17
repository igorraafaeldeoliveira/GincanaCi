<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Integrante extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent::__construct();
        //chama o metodo que faz a validção de login de usuario
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->load->model('Integrante_model', 'cm');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['integrantes'] = $this->cm->getALL();
        $this->load->view('Header');
        $this->load->view('ListaIntegrantes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');

        if ($this->form_validation->run() == false) {
            $data['integrantes'] = $this->cm->getEquipe();
            $this->load->view('Header');
            $this->load->view('FormIntegrante', $data);
            $this->load->view('Footer');
        } else {

            $data = array(
                'nome' => $this->input->post('nome'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
                'id_equipe' => $this->input->post('id_equipe'),
                'data_nasc' => $this->input->post('data_nasc'),
            );
            if ($this->Integrante_model->insert($data)) {
                redirect('Integrante/listar');
            } else {
                redirect('Integrante/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('id_equipe', 'id_equipe', 'required');

            if ($this->form_validation->run() == false) {
                $data['integrantes'] = $this->Integrante_model->getEquipe();
                $data['integrante'] = $this->Integrante_model->getOne($id);
                $this->load->view('Header');
                $this->load->view('FormIntegrante', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'id_equipe' => $this->input->post('id_equipe'),
                );
                if ($this->Integrante_model->update($id, $data)) {
                    redirect('Integrante/listar');
                } else {
                    redirect('Integrante/alterar/' . $id);
                }
            }
        } else {
            redirect('Integrante/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            if ($this->Integrante_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Equipe deletada com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar Equipe...');
            }
        }
        redirect('Integrante/listar');
    }

}
