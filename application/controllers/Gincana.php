<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Gincana extends CI_Controller {

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $this->load->model('Gincana_model', 'cm');
        $data['provas'] = $this->cm->getALL();
        $this->load->view('ListaGincanas',$data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('tempo', 'tempo', 'required');
        $this->form_validation->set_rules('nm_integrantes', 'nm_integrantes', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('FormGincana');
        } else {
            $this->load->model('Gincana_model');
            $data = array(
                'nome' => $this->input->post('nome'),
                'tempo' => $this->input->post('tempo'),
                'nm_integrantes' => $this->input->post('nm_integrantes'),
                'descricao' => $this->input->post('descricao'),
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
            $this->form_validation->set_rules('tempo', 'tempo', 'required');
            $this->form_validation->set_rules('nm_integrantes', 'nm_integrantes', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');

            if ($this->form_validation->run() == false) {
                $data['prova'] = $this->Gincana_model->getONE($id);
                $this->load->view('FormGincana', $data);
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'tempo' => $this->input->post('tempo'),
                    'nm_integrantes' => $this->input->post('nm_integrantes'),
                    'descricao' => $this->input->post('descricao'),
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
     
    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Gincana_model');    
            if($this->Gincana_model->delete($id)) {
                $this->session->set_flashdata('mensagem',
                            'Prova deletada com sucesso!');                            
            } else {
                $this->session->set_flashdata('mensagem',
                            'Falha ao deletar prova...');
            }
        }
        redirect('Gincana/listar');
    }
    

}
