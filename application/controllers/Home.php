<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
    }

    public function main_page($filter_tanggal = ''){
        // $data['is_home'] = true;
        $data = array(
            'is_home' => true,
            'sum_positif' => $this->db->query('SELECT SUM(i.positif) AS total FROM covid i')->row()->total,
            'sum_sembuh' => $this->db->query('SELECT SUM(i.sembuh) AS total FROM covid i')->row()->total,
            'sum_meninggal' => $this->db->query('SELECT SUM(i.meninggal) AS total FROM covid i')->row()->total,
            'filter_tanggal' => $filter_tanggal,
            'controll' => $this
        );
        
        $query_covid = $this->db->query("select b.nama_kelurahan, a.positif, a.sembuh, a.meninggal from kelurahan b, covid a where a.fk_kelurahan = b.id_kelurahan");    
        $hasil_covid = $query_covid->result_array();
        for($i = 0; $i < sizeof($hasil_covid); $i++){
            $_GET["".$hasil_covid[$i]['nama_kelurahan']."_terkonfirmasi_positif"] = $hasil_covid[$i]['positif'];
            $_GET["".$hasil_covid[$i]['nama_kelurahan']."_sembuh"] = $hasil_covid[$i]['sembuh'];
            $_GET["".$hasil_covid[$i]['nama_kelurahan']."_meninggal"] = $hasil_covid[$i]['meninggal'];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
    
    public function validateDate($date, $format = 'Y-m-d'){
        $d = DateTime::createFromFormat($format, $date);
        // echo $d && $d->format($format) == $date . "<br />\n";
        // echo $date . "<br />\n";
        // echo $d && $d->format($format) === $date;
        // echo "<br />\n";
        // echo $date;
        // echo "<br />\n";
        return $d && $d->format($format) == $date;
    }
    
    public function index()
    {
        $this->main_page();
    }
    public function filter($filter_tanggal = '')
    {
        $this->main_page($filter_tanggal);
    }
    public function about()
    {
        $data['is_about'] = true;

        $data = array(
            'is_home' => true,
            'sum_positif' => $this->db->query('SELECT SUM(i.positif) AS total FROM covid i')->row()->total,
            'sum_sembuh' => $this->db->query('SELECT SUM(i.sembuh) AS total FROM covid i')->row()->total,
            'sum_meninggal' => $this->db->query('SELECT SUM(i.meninggal) AS total FROM covid i')->row()->total,
        );
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer');
    }
    public function contact()
    {
        $data['is_contact'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('templates/footer');
    }

    public function blog()
    {
        $data['is_blog'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/blog');
        $this->load->view('templates/footer');
    }
}
