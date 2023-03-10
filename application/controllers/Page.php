<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function detail(){
		$ids = $this->uri->segment(3);
		$dat = $this->db->query("SELECT * FROM halamanstatis where judul_seo='".$this->db->escape_str($ids)."'");
	    $row = $dat->row();
	    $total = $dat->num_rows();
	        if ($total == 0){
	        	redirect('main');
	        }
		$data['title'] = $row->judul;
		$data['description'] = description();
		$data['keywords'] = keywords();
		$data['record'] = $this->model_halaman->page_detail($ids)->row_array();
		$data['infoterbaru'] = $this->model_berita->info_terbaru(6);
		$this->model_halaman->page_dibaca_update($ids);
		$this->template->load('loko-kampus/template','loko-kampus/view_page',$data);
	}
}
