<?php
class Dbartikel extends CI_Model{

    public function create($data=FALSE) {
        $this->db->set('id','UUID()',FALSE);
        $this->db->insert('artikel', $data);
    }

    public function read($cari=FALSE, $config) {
        $level = $this->session->userdata('level');
        $aku = $this->session->userdata('nama');
        if ($cari) {
            $hasilquery = $this->db->like('author',$cari)->or_like('judul',$cari)->order_by('tanggal', 'desc')->get('artikel', $config['per_page'], $this->uri->segment(3));
        }
        else {
            $hasilquery=$this->db->order_by('tanggal', 'desc')->get('artikel', $config['per_page'], $this->uri->segment(3));
        }

        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;  
        }
    }

    public function getOne($id=FALSE) {
        $hasil = $this->db->where('id', $id)
                          ->limit(1)
                          ->get('artikel');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id)
                 ->update('artikel', $data);
    }

    public function readMore($slug=FALSE) {
        $hasil = $this->db->where('slug', $slug)
                          ->limit(1)
                          ->get('artikel');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function recent($id)
    {
        return $this->db->limit(2)->where('id !=', $id)->order_by('id', 'RANDOM')->get('artikel')->result();
    }

    public function delete($id) {
        $this->db->where('id', $id)
                 ->delete('artikel');
    }
    
}