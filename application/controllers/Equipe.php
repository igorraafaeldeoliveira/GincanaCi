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
        $this->load->model('Equipe_model');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['equipes'] = $this->Equipe_model->getALL();
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
          
            $data = array(
                'nome' => $this->input->post('nome'),
            );
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('imagem')) {
                $error = $this->upload->display_errors();
                //cria uma sessão com o error e o redireciona
                $this->session->set_flashdata('mensagem');
                redirect('Equipe/listar'); //Se der certo manda para a lista 
                exit();
            } else {
                //pega o nome do arquivo que foi enviado e adiciona no array $data que
                $data['imagem'] = $this->upload->data('file_name');
            }
            if ($this->Equipe_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert sucees>Sucesso</div>"');
                redirect('Equipe/listar');
            } else {
                redirect('Equipe/cadastrar');
                $this->session->set_flashdata('mensagem', '<div class="alert alert danger>Sucesso</div>"');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');

            if ($this->form_validation->run() == false) {
                $data['equipe'] = $this->Equipe_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('FormEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'imagem' => $this->input->post('imagem'),
                );

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
               
                if (!$this->upload->do_upload('imagem')) {
                    $error = $this->upload->display_errors();     
                  
                    //cria uma sessão com o error e o redireciona
                    $this->session->set_flashdata('mensagem', '<div class=alert alert success>Imagem foi cadastrada com sucesso</div>');
                    redirect('Equipe/listar'); //Se der certo manda para a lista 
                    exit();
                } else {
                    //pega o nome do arquivo que foi enviado e adiciona no array $data que
                  
                    $data['imagem'] = $this->upload->data('file_name');
                }

                if ($this->Equipe_model->update($id, $data)) {
                   
                    redirect('Equipe/listar');
                } else {
                    redirect('Equipe/alterar' . $id);
                }
            }
        } else {
            redirect('Equipe/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $equipe = $this->Equipe_model->getOne($id);
            if ($equipe) {
                if ($this->Equipe_model->delete($id)) {
                    unlink('uploads/' . $equipe->imagem);
                    $this->session->set_flashdata('mensagem', 'Equipe deletada com sucesso!');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao deletar Equipe...');
                }
            }
        }
        redirect('Equipe/listar');
    }

}
