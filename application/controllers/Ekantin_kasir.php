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
        $data['transaksi'] = $this->model_system->tampil_tran();
        $this->load->view('kasir/kas_pay',$data);
    }

    // pembayaran order
    public function kasir_bayar()
    {
        $this->model_system->bayar();
    }

    public function inputOrder()
    {
        $tableorder = 'order';
        $tabledetailorder = 'detail_order';
        $tabletransaksi = 'transaksi';

        $idproduct = $_POST['product_id'];
        $totalprice = $_POST['total_price'];
        $qtyproduct = $_POST['product_qty'];

        $iduser = $this->input->post('id_user');

        $dataorder = array(
            'id_user' => $iduser,
            'status_order' => 'menunggu',
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->model_system->insertTable($tableorder, $dataorder);

        $whereorder = array(
            'id_user' => $iduser, 
            'status_order' => 'menunggu',
        );

        $idorder = $this->model_system->readColumnTable($tableorder, $whereorder)->id_order;

        $datadetailorder = array();
        $index = 0;
        foreach ($idproduct as $productid) {
            array_push($datadetailorder, array(
                'id_order' => $idorder,
                'id_masakan' => $productid,
                'kuantitas' => $qtyproduct[$index],
            ));
            $index++;
        }

        $this->model_system->insertBatchTable($tabledetailorder, $datadetailorder);

        $datatransaksi = array(
            'id_user' => $iduser,
            'id_order' => $idorder,
            'total_bayar' => $totalprice,
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->model_system->insertTable($tabletransaksi, $datatransaksi);

        redirect('dashboard/belanja');
    }
}

