<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registro
 *
 * @author marioeduardo
 */
class registro extends CI_Controller{
    public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('is_login')) {
//            redirect(base_url() . "login", 'refresh');
//        }
        $this->load->model('usuario_model');
        $this->load->model('operador_model');
        $this->load->model('paquete_model');
        $this->load->model('beneficiario_model');
        $this->load->model('propietario_model');
    }
    
    public function index() {
        $data = array();
        $data['titulo'] = "Súper Recarga | Registro";
        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $data = $this->load->view('app/public/registro_view', $data, FALSE);
    }
    
    public function registro_post() {
        //Validamos los campos del formulario
        $this->form_validation->set_rules('telefono1', 'telefono1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono2', 'telefono2', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        
        if ($this->form_validation->run()) {
            $usuario=$this->input->post('telefono1');
            $datos_propietario = $this->propietario_model->info_propietario($usuario);
            
            if (!is_null($datos_propietario)) {
                redirect(base_url()."login",'refresh');
            }
            else{
                
                $cadena_base = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                $cadena_base .= '0123456789';
                $cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
                
                $largo=9;
                $password = '';
                $limite = strlen($cadena_base) - 1;

                for ($i = 0; $i < $largo; $i++){
                    $password .= $cadena_base[rand(0, $limite)];
                }

                $arr_propietario = array();
                $arr_propietario['telefono']=$this->input->post('telefono1');
                $arr_propietario['correo'] = $this->input->post('email');
                $arr_propietario['curp'] = $password;
                $arr_propietario['contrasena'] = md5($password);
                $arr_propietario['estatus'] = 1;
                
                $this->propietario_model->insertar($arr_propietario);
                redirect(base_url() . "login", 'refresh');
            }
        }
        else{
            var_dump(validation_errors());
        }
    }
}
