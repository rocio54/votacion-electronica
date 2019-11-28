<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class urnas_controller extends CI_Controller{

	public function __construct(){
		parent ::__construct();
		$this->load->model('urnas_model');
	}
	public function index(){
		$datos['urnas'] = $this->urnas_model->get_urnas();
		$datos['sede']  = $this->urnas_model->get_sede();
		$this->load->view('urnas_view', $datos);
	}

	public function eliminar($id){
		$this->urnas_model->eliminar($id);
		redirect('/urnas_controller/index','refresh');
	}

	public function insertar(){
		$datos['id_urnas']  = $_POST['id_urnas'];
		$datos['nombre_urnas'] = $_POST['nombre_urnas'];
		$datos['sede']         = $_POST['sede'];

		$msj = $this->urnas_model->insertar($datos);
		if ($msj == "success") {
      $datos['urnas'] = $this->urnas_model->get_urnas(); //Estos esta en la funcion indexs
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('urnas_view', $datos);
  }
		//redirect('/urnas_controller/index','refresh');
}

public function get_datos($id){
	$datos['urnas'] = $this->urnas_model->get_datos($id);
	$datos['sede']  = $this->urnas_model->get_sede();
	$this->load->view('urnas_viewact', $datos);
}

public function actualizar(){
	$datos['id_urnas']  = $_POST['id_urnas'];
	$datos['nombre_urnas'] = $_POST['nombre_urnas'];
	$datos['sede']         = $_POST['sede'];

	$msj = $this->urnas_model->actualizar($datos);
	if ($msj == 'modi') {
		$datos['urnas'] = $this->urnas_model->get_urnas();
		$datos['sede']  = $this->urnas_model->get_sede();
		$datos['msj'] = 'modi';
		$this->load->view('urnas_view', $datos);
	}else{
		$datos['urnas'] = $this->urnas_model->get_urnas();
		$datos['sede']  = $this->urnas_model->get_sede();
		$datos['msj'] = 'ErrorM';
		$this->load->view('urnas_view', $datos);
	}

}
}
?>