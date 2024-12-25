<?php
class Search_model extends CI_Model {

    public function search($query) {
        if (empty($query)) {
            return [];
        }
        $this->db->like('judul', $query);
        $this->db->order_by('RAND()'); // Add this line to randomize results
        $results = $this->db->get('harga');
        return $results->result();
    }
}
?>