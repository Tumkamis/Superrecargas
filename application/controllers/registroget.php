<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
/**
 * Description of registroget
 *
 * @author marioeduardo
 */
class registroget extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->model('operador_model');
        $this->load->model('paquete_model');
        $this->load->model('beneficiario_model');
        $this->load->model('propietario_model');
    }
    
    public function index($tipo) {
        $tipoinst=$tipo;
        $data = array();
        $data['tipoinsts'] = $this->propietario_model->tipo_instituciones();
        $data['titulo'] = "Súper Recarga | Registro";
        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $data = $this->load->view('app/public/registro_view', $data, FALSE);
    }
}
