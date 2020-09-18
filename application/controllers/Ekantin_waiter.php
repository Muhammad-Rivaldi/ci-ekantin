<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekantin_waiter extends CI_Controller
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
    public function waiter_dash()
    {
        $data['menu'] = $this->model_system->tampil_menu();
        $this->load->view('waiter/wai_dash',$data);
    }

    // membuka halaman pemesanan
    public function waiter_order()
    {
        $data['order'] = $this->model_system->tampil_order();
        $this->load->view('waiter/wai_ord',$data);
    }

    // insert order ke db
    public function waiter_insertorder()
    {
        $this->model_system->insert_order();
    }
}
