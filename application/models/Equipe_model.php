<?php

/*
 * @author Igor
 */

class Equipe_model extends CI_Model {

    public function insert($data = array()) {
        $this->db->insert('equipe', $data);
        return $this->db->affected_rows();
    }

    public function getALL() {
        $query = $this->db->get('equipe');
        return $query->result();
    }

    public function getOne($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('equipe');
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update('equipe', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->delete('equipe');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
