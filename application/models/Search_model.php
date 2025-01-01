<?php
class Search_model extends CI_Model {

    public function search($query) {
        if (empty($query)) {
            return [];
        }
        $keywords = explode(' ', $query);
        $this->db->distinct();
        $this->db->select('h.*, uc.user_company_judul, kab.nama');
        $this->db->from('harga h');
        $this->db->join('user_bisnis ub','h.harga_id_bisnis = ub.id_bisnis','inner');
        $this->db->join('user_company uc','ub.user_company_account = uc.user_company_id','inner');
        $this->db->join('kabupaten kab','ub.kabupaten = kab.id','inner');
        $this->db->group_start();
        foreach ($keywords as $word) {
            $this->db->or_like('h.judul', $word);
            $this->db->or_like('uc.user_company_judul', $word);
        }
        $this->db->group_end();
        $this->db->order_by('RAND()');
        $results = $this->db->get();

        return $results->result();
    }
}
?>