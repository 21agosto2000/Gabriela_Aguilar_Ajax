<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class frutaM extends CI_Model {

	public function get_fruta()
	{
		$this->db->select('f.id_fruta,f.nombre_fruta,c.nombre_color,s.nombre_sabor');
		$this->db->from('fruta f');
		$this->db->join('color c','c.id_color=f.id_color');
		$this->db->join('sabor s','s.id_sabor=f.id_sabor');

		$exe = $this->db->get();
		return $exe->result();
	}
	public function eliminar($id){
		$this->db->where('id_fruta', $id);
		$this->db->delete('fruta');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function set_fruta($datos){
		$this->db->set('fruta', $datos["fruta"]);
		$this->db->set('color', $datos["color"]);
		$this->db->set('sabor', $datos["sabor"]);

		$this->db->insert('fruta');

		if($this->db->affected_rows()>0)
			return "add";
	}

}


?>