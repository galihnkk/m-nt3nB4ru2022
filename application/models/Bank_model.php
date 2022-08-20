<?php
class Bank_model extends CI_model{

  public $id    = 'id';
  public $status_id    = 'status_id';
  public $bank_table    = 'paste_finance_bank';
  public $bank_table_init    = 'pfb';
  public $bank_status_table    = 'dokumen_status';
  public $bank_status_table_init    = 'ps';
  public $bank_field    = 'pfb.id, pfb.description, pfb.account, pfb.name, pfb.address, pfb.city, pfb.currency, pfb.coa_bank, pfb.status_id, pfb.blocked, pfb.create_user, pfb.create_date, pfb.modified_user, pfb.modified_date';
  public $bank_status_field    = 'ps.id as ps_id, ps.description as bank_status';

  public function bank_view($data,$order,$ordering)
  {
    $this->db->select($this->bank_field.','.$this->bank_status_field);
    $this->db->from($this->bank_table.' '.$this->bank_table_init);
    $this->db->join($this->bank_status_table.' '.$this->bank_status_table_init, $this->bank_table_init.'.'.$this->status_id.'='.$this->bank_status_table_init.'.'.$this->id, 'LEFT');
    $this->db->where($data);
    $this->db->order_by($order,$ordering);
    return $this->db->get()->result_array();
  }

  public function tambah_bank($data)
  {
    $this->db->insert($this->bank_table, $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
  }
  public function edit($table, $data){
      return $this->db->get_where($table, $data);
  }
}
