<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekantin_kasir extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_system');
        $this->load->helper(array('url', 'form'));
    }

    // membuka halaman default
    public function kasir_dash()
    {
        $data['order'] = $this->model_system->tampil_order();
        $this->load->view('kasir/kas_dash',$data);
    }

    // membuka halaman transaksi
    public function kasir_payment()
    {
        $data['transaksi'] = $this->model_system->transaksi();
        $data['total_bayar'] = $this->model_system->total_pembayaran();
        $this->load->view('kasir/kas_pay',$data);
    }

    // pembayaran order
    public function kasir_bayar()
    {
        $this->model_system->bayar();
    }

    // checkout transaksi
    public function checkout()
    {
        $this->model_system->finish();
    }
}

