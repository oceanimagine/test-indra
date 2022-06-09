<?php

class Home1 extends CI_Controller
{


    public function index()
    {
        $data['is_home'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
    public function about()
    {
        $data['is_about'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/about');
        $this->load->view('templates/footer');
    }
    public function action()
    {
        $data['is_action'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/action');
        $this->load->view('templates/footer');
    }
    public function contact()
    {
        $data['is_contact'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact');
        $this->load->view('templates/footer');
    }
    public function doctores()
    {
        $data['is_doctores'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/doctores');
        $this->load->view('templates/footer');
    }
    public function news()
    {
        $data['is_news'] = true;
        $this->load->view('templates/header', $data);
        $this->load->view('home/news');
        $this->load->view('templates/footer');
    }
}
