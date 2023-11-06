<?php
class Medel extends CI_Model
{
    function tampil()
    {
        return $this->db->get('penumpang')->result();
    }

    public function simpan_tiket($data)
    {
        $this->db->insert('penumpang', $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penumpang');
    }
    public function get_by_id($id)
    {
        // Implementasikan metode ini untuk mendapatkan data berdasarkan ID
        $this->db->where('id', $id);
        return $this->db->get('penumpang')->row();
    }
    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('penumpang', $data);
    }
}
