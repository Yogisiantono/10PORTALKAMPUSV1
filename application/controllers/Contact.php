<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function index(){
		if (isset($_POST['submit'])){
			$this->model_main->kirim_Pesan();
			redirect('contact');
		}else{
			$mp = $this->db->query("SELECT * FROM identitas")->row();
			$data['title'] = 'Hubungi Kami';
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['maps'] = $mp->maps;
			$this->template->load('loko-kampus/template','loko-kampus/view_contact',$data);
		}
	}
}
