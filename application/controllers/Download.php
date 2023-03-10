<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends CI_Controller {
	public function index(){
		$data['title'] = 'Halaman Download';
		$data['description'] = description();
		$data['keywords'] = keywords();
		$jumlah= $this->model_download->hitungdownload()->num_rows();
		$config['base_url'] = base_url().'download/index';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 10; 	
			if ($this->uri->segment('3')!=''){
				$dari = $this->uri->segment('3');
			}else{
				$dari = 0;
			}
			if (is_numeric($dari)) {
				$data['download'] = $this->model_download->index($dari, $config['per_page']);
			}else{
				redirect('download');
			}
		$this->pagination->initialize($config);
		$this->template->load('loko-kampus/template','loko-kampus/view_download',$data);
	}

	function file(){
		$name = $this->uri->segment(3);
		$this->model_download->updatehits($name);
		$data = file_get_contents("asset/files/".$name);
		force_download($name, $data);
	}
}
