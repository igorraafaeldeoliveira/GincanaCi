<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Cliente extends CI_Controller {
    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }
    public function listar() {
        $this->load->model('Gincana_model', 'cm');
        $data['gincanas'] = $this->cm->getALL();
        $this->load->view('ListaGincanas', $data);
    }
    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required'); 
        if ($this->form_validation->run() == false) {
            $this->load->view('FormGincana');
        } else {
            $this->load->model('Gincana_model');
            $data = array(
                'nome' => $this->input->post('nome'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf'),
            );
            if ($this->Gincana_model->insert($data)) {
                redirect('Gincana/listar');
            } else {
                redirect('Gincana/cadastrar');
            }
        }
    }
    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Gincana_model');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            
            if ($this->form_validation->run() == false) {
                $data['cliente'] = $this->Gincana_model->getONE($id);
                $this->load->view('FormGincana', $data);
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf'),
                );
                if ($this->Gincana_model->update($id, $data)) {
                    redirect('Gincana/listar');
                } else {
                    redirect('Gincana/alterar/' . $id);
                }
            }
        } else {
            redirect('Gincana/listar');
        }
    }

}
