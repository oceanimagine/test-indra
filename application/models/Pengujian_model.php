<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengujian_model extends CI_Model
{

	public function getHasilKlaster()
	{
		$this->db->join('covid', 'covid.id_covid = hasil_klaster1.fk_covid', 'join');
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('hasil_klaster1')->result();
	}

	public function getHasilKlasterGroupC()
	{
		$this->db->group_by('c');
		$this->db->join('covid', 'covid.id_covid = hasil_klaster1.fk_covid', 'join');
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('hasil_klaster1')->result();
	}

	public function getHasilPengujian()
	{
		return $this->db->get('hasil_pengujian')->result();
	}
}

/* End of file Pengujian_model.php */
/* Location: ./application/models/Pengujian_model.php */