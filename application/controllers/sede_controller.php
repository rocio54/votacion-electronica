<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class sede_controller extends CI_Controller{

	public function __construct(){
		parent :: __construct();
		$this->load->model('sede_model');
	}

	public function index(){
		$datos['sede'] = $this->sede_model->get_sede();
		$datos['municipio']  = $this->sede_model->get_municipio();
		$this->load->view('sede_view', $datos);
	}

	public function eliminar($id){
		$this->sede_model->eliminar($id);
		redirect('/sede_controller/index','refresh');
	}

	public function insertar(){

		$datos['nombre_sede'] = $_POST['nombre_sede'];
		$datos['direccion'] = $_POST['direccion'];
		$datos['nombre_municipio'] = $_POST['nombre_municipio'];

		$msj = $this->sede_model->insertar($datos);
		if ($msj == "success") {
      $datos['sede'] = $this->sede_model->get_sede(); //Estos esta en la funcion indexs
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('sede_view', $datos);
  }
}

public function get_datos($id){
	$datos['sede'] = $this->sede_model->get_datos($id);
	$datos['municipio']  = $this->sede_model->get_municipio();
	$this->load->view('sede_viewact', $datos);
}

public function actualizar(){
	$datos['id'] = $_POST['id'];
	$datos['nombre_sede'] = $_POST['nombre_sede'];
	$datos['direccion'] = $_POST['direccion'];
	$datos['nombre_municipio'] = $_POST['nombre_municipio'];

	$msj = $this->sede_model->actualizar($datos);
	if($msj == 'modi') {
		$datos['sede'] = $this->sede_model->get_sede();
		$datos['municipio']  = $this->sede_model->get_municipio();
		$datos['msj'] = 'modi';
		$this->load->view('sede_view', $datos);
	}else{
		$datos['sede'] = $this->sede_model->get_sede();
		$datos['municipio']  = $this->sede_model->get_municipio();
		$datos['msj'] = 'ErrorM';
		$this->load->view('sede_view', $datos);

	}
}
}

?>   