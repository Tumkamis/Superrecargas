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
        $data['tipoinsts'] = $this->propietario_model->tipo_instituciones();
        $data['titulo'] = "Súper Recarga | Registro";
        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $data = $this->load->view('app/public/registro_view', $data, FALSE);
    }
    
    public function buscar_institucion() {
        $data = array();
        $options = "";
        if ($this->input->post('tipo')) {
            $tipo = $this->input->post('tipo');
            $instituciones = $this->propietario_model->consultar_instituciones($tipo);
            ?>
                <option selected="">Selecciona</option>
                <?php
            foreach ($instituciones as $fila) {
                ?>
                 <option value="<?= $fila->idinstitucion ?>"><?= $fila->nombre ?></option>
                <?php
            }
        }
    }
    
    public function registro_post() {
        //Validamos los campos del formulario
        $this->form_validation->set_rules('telefono1', 'telefono1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono2', 'telefono2', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('instituciones', 'instituciones', 'trim|required|xss_clean');
        
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
                $arr_propietario['idinstitucion'] = $this->input->post('instituciones');
                $arr_propietario['contrasena'] = md5($password);
                $arr_propietario['estatus'] = 2;
                
                $idinstitucion=$this->input->post('instituciones');
                $rutaimg=$this->propietario_model->ruta_img_correo($idinstitucion);
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
                    $mail->Subject = 'SÚPERRECARGA Confirmación de Registro';
//            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
                    //$mail->Body = 'Correo de comprobación';
                    
                    $mail->AddEmbeddedImage(base_url().'Superrecarga/static/instituciones/'.$rutaimg->img.'.jpg', 'imagen-inst');
                    $mail->AddEmbeddedImage('static/Logotipo-Super-Recarga-R.png', 'imagen-sr');
                    $cuerpo='
                <html>
                    <head></head>
                    <body>
                        <label style="font-family: sans-serif; font-size: 14px">
                            Bienvenido al Registro SÚPERRECARGA
                        </label>
                        <br>
                        <br>
                        <label style="font-family: sans-serif; font-size: 14px">
                            A partir de hoy vas a AHORRAR y APOYAR en todas tus recargas a: 
                        </label>
                        <br>
                        <br>
                        <img src="cid:imagen-inst" height="250px" width="250px">
                        <br>
                        <br>
                        <label style="font-family: sans-serif; font-size: 14px">
                            Tu contraseña inicial es: '.$password.'
                        </label>
                        <br>
                        <br>
                        <label style="font-family: sans-serif; font-size: 14px">
                            Para tu seguridad, el sistema te solicitará una nueva contraseña en tu primer Login. 
                        </label>
                        <br>
                        <br>
                        <label style="font-family: sans-serif; font-size: 14px">
                            Atte 
                        </label>
                        <br>
                        <br>
                        <img src="cid:imagen-sr" height="150px" width="150px">
                    </body>
                </html>'
                    ;
                    $mail->Body = $cuerpo;
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
