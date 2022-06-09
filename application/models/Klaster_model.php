<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klaster_model extends CI_Model
{

	public function getTahun()
	{
		$this->db->distinct();
		$this->db->group_by('tahun');
		return $this->db->get('tanaman')->result();
	}
	public function getTanggal()
	{
		$this->db->distinct();
		$this->db->group_by('tanggal');
		return $this->db->get('covid')->result();
	}

	public function getJagung($tahun)
	{
		$this->db->where('tahun', $tahun);
		$this->db->join('lokasi', 'lokasi.id_lokasi = tanaman.fk_lokasi', 'join');
		return $this->db->get('tanaman')->result();
	}

	public function getJagungRand($tahun, $limit)
	{
		$this->db->where('tahun', $tahun);
		$this->db->order_by('rand()');
		$this->db->limit($limit);
		$this->db->join('lokasi', 'lokasi.id_lokasi = tanaman.fk_lokasi', 'join');
		return $this->db->get('tanaman')->result();
	}
	public function getCovid($tanggal)
	{
		$this->db->where('tanggal', $tanggal);
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('covid')->result();
	}
	public function getCovidRand($tanggal, $limit)
	{
		$this->db->where('tanggal', $tanggal);
		$this->db->order_by('rand()');
		$this->db->limit($limit);
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('covid')->result();
	}

	public function getIterasi($iterasi)
	{
		$this->db->where('iterasi',  (string) $iterasi);
		return $this->db->get('hasil_iterasi')->result();
	}

	public function getCentroidTempByIterasi()
	{
		$this->db->group_by('iterasi');
		return $this->db->get('centroid_temp')->result();
	}

	public function getCentroidTemp()
	{
		return $this->db->get('centroid_temp')->result();
	}

	public function getHasilIterasi()
	{
		return $this->db->get('hasil_iterasi')->result();
	}

	public function getCentroidTempByC()
	{
		$this->db->group_by('c');
		return $this->db->get('centroid_temp')->result();
	}

	public function getHasilKlaster1()
	{
		$this->db->join('tanaman', 'tanaman.id_tanaman = hasil_klaster.fk_tanaman', 'join');
		$this->db->join('lokasi', 'lokasi.id_lokasi = tanaman.fk_lokasi', 'join');
		return $this->db->get('hasil_klaster')->result();
	}
	public function getHasilKlaster()
	{
		$this->db->join('covid', 'covid.id_covid = hasil_klaster1.fk_covid', 'join');
		return $this->db->get('hasil_klaster1')->result();
	}
}

/* End of file Klaster_model.php */
/* Location: ./application/models/Klaster_model.php */