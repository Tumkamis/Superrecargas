<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fundaciones
 *
 * @author marioeduardo
 */
class fundaciones extends CI_Controller{
    public function __construct() {
        parent::__construct();
//        if (!$this->session->userdata('is_login')) {
//            redirect(base_url() . "login", 'refresh');
//        }
        $this->load->model('login_model');
    }
    
    public function index() {
        $data = array();
        $data['titulo'] = "Súper Recarga | Fundaciones";

        $data = $this->load->view('fundaciones_view', $data, FALSE);
        //$data = $this->load->view('login_view_1', $data, FALSE);
    }
    public function registro() {
        $data = array();
        $data['titulo'] = "Súper Recarga | Fundaciones";

        $data = $this->load->view('fundacionregistro_view', $data, FALSE);
    }
    
    public function registro_post() {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('nomfudacion', 'nomfudacion', 'trim|required|xss_clean');
            $this->form_validation->set_rules('nomresponsable', 'nomresponsable', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('telefonocel', 'telefonocel', 'trim|required|xss_clean');
            $this->form_validation->set_rules('telefonoofc', 'telefonoofc', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                
                $arr_solicitud = array();
                $arr_solicitud['nombrefundacion'] = $this->input->post('nomfudacion');
                $arr_solicitud['nombreresponsable'] = $this->input->post('nomresponsable');
                $arr_solicitud['correo'] = $this->input->post('email');
                $arr_solicitud['telcelular'] = $this->input->post('telefonocel');
                $arr_solicitud['teloficina'] = $this->input->post('telefonoofc');
                
                $idpropietario = $this->login_model->insertar_solicitud($arr_solicitud);
                echo json_encode(array("response_code" => 200, "evento_id" => $idpropietario));
            } else {
                http_error(403);
            }
        } else {
            http_error(400);
        }
    }
}
