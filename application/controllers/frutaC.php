<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frutaC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('frutaM');
	}
	public function index()
	{
		$data = array('title' => 'Fruta || Ajax');
		$this->load->view('template/header',$data);
		$this->load->view('frutaV');
		$this->load->view('template/footer');
	}
	public function get_fruta(){
		$respuesta = $this->frutaM->get_fruta();
		echo json_encode($respuesta);
	}

	public function get_color(){
		$respuesta = $this->frutaM->get_color();
		echo json_encode($respuesta);
	}

	public function get_sabor(){
		$respuesta = $this->frutaM->get_sabor();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->frutaM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['fruta'] = $this->input->post('fruta');
		$datos['color'] = $this->input->post('color');
		$datos['sabor'] = $this->input->post('sabor');

		$respuesta = $this->frutaM->set_fruta($datos);
		echo json_encode($respuesta);
	}
}

?>