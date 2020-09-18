<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekantin_controller extends CI_Controller
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
    public function index()
    {
        redirect('ekantin_controller/login');
    }

    // membuka halaman login
    public function login()
    {
        $this->load->view('auth/login');
    }

    // untuk proses login
    public function aksi_login()
    {
        $usernames = $this->input->post('usernama');
        $passwords = md5($this->input->post('katasandi'));
        $where = array(
            'username' => $usernames,
            'password' => $passwords
        );
        $cek = $this->model_system->cek_login($where)->num_rows();

        if ($cek > 0) {
            $role = $this->model_system->cek_login($where)->row(0)->id_level;
            if ($role == '1') {
                $namauser = $this->model_system->cek_login($where)->row(0)->nama_user;
                $data_session = array(
                    'nama_user' => $namauser,
                    'username' => $usernames,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:" . site_url() . "/ekantin_controller/owner_dash");
                } else {
                    header("Location:" . site_url() . "ekantin_controller/index");
                }
            } elseif ($role == '2') {
                $namauser = $this->model_system->cek_login($where)->row(0)->nama_user;
                $data_session = array(
                    'nama_user' => $namauser,
                    'username' => $usernames,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:" . site_url() . "/ekantin_controller/admin_dash");
                } else {
                    header("Location:" . site_url() . "ekantin_controller/index");
                }
            } elseif ($role == '3') {
                $namauser = $this->model_system->cek_login($where)->row(0)->nama_user;
                $data_session = array(
                    'nama_user' => $namauser,
                    'username' => $usernames,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:" . site_url() . "/ekantin_kasir/kasir_dash");
                } else {
                    header("Location:" . site_url() . "ekantin_controller/index");
                }
            } elseif ($role == '4') {
                $namauser = $this->model_system->cek_login($where)->row(0)->nama_user;
                $data_session = array(
                    'nama_user' => $namauser,
                    'username' => $usernames,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("Location:" . site_url() . "/ekantin_waiter/waiter_dash");
                } else {
                    header("Location:" . site_url() . "ekantin_controller/index");
                }
            }
        } else {
            header("Location:" . base_url() . "");
        }
    }

    // untuk proses logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	// 

    // membuka halaman dashboard admin
    public function admin_dash()
    {
        $data['menu'] = $this->model_system->tampil_menu();
        $this->load->view('admin/index',$data);
        
    }

    // membuka halaman menu admin
    public function admin_menu()
    {
        $data['menu'] = $this->model_system->tampil_menu();
        $this->load->view('admin/menu',$data);
    }

    // membuka halaman menu user
    public function admin_users()
    {
        $data['user'] = $this->model_system->tampil_user();
        $this->load->view('admin/user',$data);
    }

    // membuka halaman menu level
    public function admin_levels()
    {
        $this->load->view('admin/level');
    }

    // insert data menu ke db
    public function admin_insertmenu()
    {
        $this->model_system->insert_menu();
    }

    // update data menu ke db
    public function admin_updatemenu()
    {
        $this->model_system->update_menu();
    }

    // delete data menu ke db
    public function admin_deletemenu($id)
    {
        $this->model_system->delete_menu($id);
    }

    // insert data user ke db
    public function admin_insertuser()
    {
        $this->model_system->insert_user();
    }

    // update data user ke db
    
    function admin_updateuser()
    {
        $this->model_system->update_user();
    }
}
