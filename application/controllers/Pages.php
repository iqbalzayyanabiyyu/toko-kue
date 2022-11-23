<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function index()
    {
        $data["title"] = "Co'Cake";
        $this->load->view("templates/header", $data);
        $this->load->view("pages/index");
        $this->load->view("templates/footer");
    }


    
    // About: Start
    public function about()
    {
        $data["title"] = "About - Co'Cake";
        $this->load->view("templates/header", $data);
        $this->load->view("pages/about");
        $this->load->view("templates/footer");
    }
    // About: End

    
}