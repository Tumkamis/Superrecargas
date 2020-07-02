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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
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
        $data['fundaciones']=$this->propietario_model->fundaciones();
        $data['iaps']=$this->propietario_model->iaps();
        $data['asociaciones']=$this->propietario_model->asociacionesciviles();
        $data['empresas']=$this->propietario_model->empresas();
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
        $this->form_validation->set_rules('fundacion', 'fundacion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('iap', 'iap', 'trim|required|xss_clean');
        $this->form_validation->set_rules('asc', 'asc', 'trim|required|xss_clean');
        $this->form_validation->set_rules('empresa', 'empresa', 'trim|required|xss_clean');
        
        if ($this->form_validation->run()) {
            $usuario=$this->input->post('telefono1');
            $correo=$this->input->post('email');
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
                $arr_propietario['idfundacion'] = $this->input->post('fundacion');
                $arr_propietario['idiap'] = $this->input->post('iap');
                $arr_propietario['idasc'] = $this->input->post('asc');
                $arr_propietario['idempresa'] = $this->input->post('empresa');
                $arr_propietario['contrasena'] = md5($password);
                $arr_propietario['estatus'] = 1;
                
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server to send through
                    //$mail->Host = 'mail.diatel.com.mx';                       // Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                    $mail->Username = 'norespondersuperrecargas@gmail.com';                     // SMTP username
                    //$mail->Password = 'akpzbktkhirkjrvs';                               // SMTP password
                    //$mail->Password = 'Armidas202020*';                               // SMTP password
                    $mail->Password = 'zaznhekisdvtsgdb';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    //Recipients
                    $mail->setFrom('norespondersuperrecargas@gmail.com', 'Super Recarga');
                    $mail->addAddress($correo);
                    //$mail->addAddress('noresponda@diatel.com.mx');
                    //Cambiar a correo de rh de la empresa
                    //$mail->addAddress('rulp@diatel.com.mx');
//            $mail->addAddress('ellen@example.com');               // Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');
                    // Attachments
                    //Para archivos
//            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    // Content
                    //$mail->addAttachment('static/pdf/CartaDescuento.pdf');
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Confirmación de registro';
//            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                    //$mail->Body = 'Correo de comprobación';
                    $mail->Body = 'Le damos la bienvenida al sistema de recargas teléfonicas Súper Recarga, esta es su contrseña para poder acceder '.$password;
                    $mail->CharSet = 'UTF-8';
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    //echo 'El mensaje se envió correctamente';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                $this->propietario_model->insertar($arr_propietario);
                redirect(base_url() . "login", 'refresh');
            }
        }
        else{
            var_dump(validation_errors());
        }
    }
}
