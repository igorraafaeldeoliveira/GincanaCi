<?php

/*
 * @author Igor
 */

class Integrante_model extends CI_Model {

    public function insert($data = array()) {
        $this->db->insert('integrante', $data);
        return $this->db->affected_rows();
    }
  
    public function getEquipe() {
        $query = $this->db->get('equipe');
        return $query->result();    
    }
    
    public function getALL() {
        $this->db->select('integrante.*, equipe.nome as nomeIntegrante');
        $this->db->from('integrante');
        
        $this->db->join('equipe', 'equipe.id=integrante.id_equipe', 'inner');
        $query = $this->db->get();
        return $query->result(); 
    }

    public function getOne($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('integrante');
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update('integrante', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('integrante');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
