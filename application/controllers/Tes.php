<?php

class Tes extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('M_Tes');
        $this->load->library('calendar');
    }

    public function index() {

        $data['data_update'] = null;
        $data['message'] = null;

        // echo $this->calendar->generate(2003, 14);

        if ($this->input->post()) {

            $this->session->set_flashdata('message', 'Anda belum masuk!');
            redirect(base_url('tes/tes_script'));
    echo "asd";

        }

        $this->load->view('tes/tes', $data);
    }

    public function data_update() {

        echo $this->M_Tes->check_update();
    }

    public function tes_script()
    {

        echo $this->session->flashdata('message');
    }
}