<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_system extends CI_Model
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
    // cek login
    public function cek_login($akun)
    {
        $data1 = $this->db->get_where('users', $akun);
        if ($data1->result() == null) {
            $this->session->set_flashdata('modal', '<div class="alert alert-danger" role="alert"> kata sandi atau username salah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("ekantin_controller/index");
        } else {
            return $data1;
        }
    }

    // insert menu
    public function insert_menu()
    {
        $foto = $_FILES['foto']['tmp_name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = './asset/foto-menu';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $gambar = '';
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_masakan' => null,
            'nama_menu' => $this->input->post('nama'),
            'foto_menu' => $gambar,
            'jenis_menu' => $this->input->post('jen_men'),
            'harga' => $this->input->post('harga'),
            'status_menu' => $this->input->post('sta_men')
        );
        echo $data;
        $this->db->set('created_at', 'NOW()', FALSE);
        $this->db->insert('menus', $data);
        $this->session->set_flashdata('modal', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect("ekantin_controller/admin_menu");
    }

    // update menu
    public function update_menu()
    {
        $foto = $_FILES['foto']['tmp_name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = './asset/foto-menu';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $gambar = $this->input->post('fot_men');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $id = $this->input->post('id');
        $data = array(
            'id_masakan' => $id,
            'nama_menu' => $this->input->post('nama'),
            'foto_menu' => $gambar,
            'jenis_menu' => $this->input->post('jen_men'),
            'harga' => $this->input->post('harga'),
            'status_menu' => $this->input->post('sta_men')
        );
        echo $data;
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->set($data);
        $this->db->where('id_masakan',$id);
        $this->db->update('menus');
        $this->session->set_flashdata('modal', '<div class="alert alert-primary " role="alert"> Data Berhasil diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect("ekantin_controller/admin_menu");
    }

    // delete menu
    public function delete_menu($id)
    {
        $where = array('id_masakan'=>$id);
        $this->db->where($where);
        $this->db->delete('menus');
        $this->session->set_flashdata('modal', '<div class="alert alert-danger " role="alert"> Data Berhasil didelete <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect("ekantin_controller/admin_menu");
    }

    // insert user
    public function insert_user()
    {
        $foto = $_FILES['foto']['tmp_name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = './asset/foto-menu';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $gambar = '';
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_user' => null,
            'username' => $this->input->post('usernama'),
            'password' => md5($this->input->post('pw')),
            'nama_user' => $this->input->post('namel'),
            'id_level' => $this->input->post('level'),
            'foto' => $gambar
        );
        echo $data;
        $this->db->set('created_at', 'NOW()', FALSE);
        $this->db->insert('users', $data);
        $this->session->set_flashdata('modal', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect("ekantin_controller/admin_users");
    }

    // update user
    public function update_user()
    {
        $foto = $_FILES['foto']['tmp_name'];
        if ($foto = '') {
            // kosong
        } else {
            $config['upload_path'] = './asset/foto-menu';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $gambar = $this->input->post('fot_men');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $id = $this->input->post('id');
        $data = array(
            'id_user' => $id,
            'username' => $this->input->post('usernama'),
            'password' => md5($this->input->post('pw')),
            'nama_user' => $this->input->post('namel'),
            'id_level' => $this->input->post('level'),
            'foto' => $gambar
        );
        echo $data;
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->set($data);
        $this->db->where('id_user',$id);
        $this->db->update('users');
        $this->session->set_flashdata('modal', '<div class="alert alert-primary " role="alert"> Data Berhasil diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect("ekantin_controller/admin_users");
    }

    // tampil data menu
    public function tampil_menu()
    {
        $query = $this->db->query('SELECT * FROM `menus`');
        return $query->result();        
    }

    // tampil data user
    public function tampil_user()
    {
        $query = $this->db->query('SELECT * FROM `users`');
        return $query->result(); 
    }

    // tampil data transaksi
    public function tampil_tran()
    {
        $query = $this->db->query('SELECT * FROM `transaksis`');
        return $query->result();
    }

    // tampil data order
    public function tampil_order()
    {
        $query = $this->db->query('SELECT * FROM `orders`');
        return $query->result();
    }
}


