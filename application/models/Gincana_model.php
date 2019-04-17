<?php

/*
 * Classse model da tabela clientes do banco de dados
 * 
 * @author Igor
 */

class Gincana_model extends CI_Model {
    public function getALL() {
        $query = $this->db->get('gincana');
        return $query->result();
    }
    public function insert($data = array()) {
        $this->db->insert('gincana', $data);
        return $this->db->affected_rows();
    }
    public function getOne($id) {
        $this->db->where('id', $id);
       $query = $this->db->get('gincana');
        return $query->row(0);
    }
    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update('gincana', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}