<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require_once 'dompdf/autoload.inc.php';

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url()."login", 'refresh');
        }
        $this->load->model('login_model');
        $this->load->model('beneficiario_model');
    }
    
    public function index() {
        date_default_timezone_set('America/Mexico_City');
        $arreglo_sesiones_propietario = array(
            'idprop' => FALSE,
            'nombre' => FALSE,
            'ap' => FALSE,
            'am' => FALSE,
            'curprfc' => FALSE,
            'telefono' => FALSE,
            'empresa' => FALSE,
            'correousu' => FALSE,
            'is_login' => FALSE
        );
        $this->session->unset_userdata($arreglo_sesiones_propietario);
        $this->session->sess_destroy();
        redirect(base_url() . "login", 'refresh');
        
        /*
         * Correos desactivados
         */
        
//        $monto=$this->session->userdata('monto');
//        $idpropietario = $this->session->userdata('idprop');
//        $telefono = $this->session->userdata('telefono');
//        $correo = $this->session->userdata('correousu');
//        
//        $datos_monto=$this->login_model->monto($idpropietario);
//        
//        $monto_inicial=$monto;
//        if (!is_null($datos_monto)) {
//            $monto_final=0;
//            foreach ($datos_monto as $monto_individual) {
//                $monto_final = $monto_final + $monto_individual->precio;
//            }
//        } 
//        else {
//            $monto_final=$monto;
//        }
//        
//        if($monto_final>$monto_inicial){
//            $beneficiarios= $this->beneficiario_model->beneficiarios_prop_detalle($idpropietario);
//            $cuerpopython='';
//            foreach ($beneficiarios as $beneficiario){
//                $cuerpopython.=$telefono.','.$beneficiario->telefono.','.$beneficiario->nomoperador.','.$beneficiario->preciopaquete.',<br>';
//            }
//            $fecha=date('Y-m-d');
//            $hora=date('H:i:s');
//            $cuerpo='<html><head></head><body>
//            <style type="text/css">
//            .ui-helper-center {
//    text-align: center;
//}
//            </style>
//                <div class="row">
//                        <div class="col-xs-12" align="left">
//                            <label style="font-family: sans-serif; font-size: 14px" style="text-align: justify;">
//                            El propietario de la cuenta con número '.$telefono.' dio de alta el siguiente listado de beneficiarios a su cuenta: 
//<br>
//<br>
//                            </label>
//                        </div>
//                    </div>
//                <div class="row" style="text-align: center;">
//                <table class="table" style="width:100%" border="1">
//
//                    <!-- thead START -->
//                    <thead>
//
//                        <tr style="font-family: sans-serif; font-size: 14px">
//                            <th class="ui-helper-center">Operador</th>
//                            <th class="ui-helper-center">Teléfono celular</th>
//                            <th class="ui-helper-center">Monto Recarga y Asistencia</th>
//                        </tr>
//
//                    </thead>
//                    <!--thead END -->
//
//                    <!--tbody START -->
//                    <tbody>';
//                foreach ($beneficiarios as $beneficiario){
//                $cuerpo.='
//                        <tr style="font-family: sans-serif; font-size: 14px">
//                            <th class="ui-helper-center">'.$beneficiario->nomoperador.'</th>
//                            <th class="ui-helper-center">'.$beneficiario->telefono.'</th>
//                            <th class="ui-helper-center">$'.$beneficiario->preciopaquete.'.00</th>
//                        </tr>';
//                }
//                $cuerpo.='
//                    </tbody>
//                    <!--tbody END -->
//
//                </table>
//                <!-- table START -->
//
//            </div>
//                        </body></html>';
//            
//            
//            $mail = new PHPMailer(true);
//            try {
//                //Server settings
//                $mail->SMTPDebug = 0;                      // Enable verbose debug output
//                $mail->isSMTP();                                            // Send using SMTP
//                $mail->Host = 'superrecarga.com.mx';                       // Set the SMTP server to send through
//                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
//                $mail->Username = 'registro@superrecarga.com.mx';                     // SMTP username
//                $mail->Password = 'nlI?Vf{ROl{}>armidas*';                               // SMTP password
//                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//                $mail->Port = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//                //Recipients
//                $mail->setFrom('registro@superrecarga.com.mx', 'Super Recarga');
//                //$mail->addAddress('norespondersuperrecargas@gmail.com');
//                $mail->addAddress('clubtcr@hotmail.com');
//                //$mail->addAddress($correo);
//                //$mail->addAddress('rulp@diatel.com.mx');
//                //$mail->addAddress('clubtcr@hotmail.com');
//                //Para archivos
////            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
////            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//                // Content
//                $mail->isHTML(true);                                  // Set email format to HTML
//                $mail->Subject = $fecha.'|'.$hora;
////            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
//                //$mail->Body = 'Correo de comprobación';
//                $mail->Body = $cuerpopython;
//                $mail->CharSet = 'UTF-8';
////            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//                $mail->send();
//                //echo 'El mensaje se envió correctamente';
//                $arreglo_sesiones_propietario = array(
//                    'idprop' => FALSE,
//                    'nombre' => FALSE,
//                    'ap' => FALSE,
//                    'am' => FALSE,
//                    'curprfc' => FALSE,
//                    'telefono' => FALSE,
//                    'empresa' => FALSE,
//                    'correousu' => FALSE,
//                    'monto' => FALSE,
//                    'is_login' => FALSE
//                );
//                $this->session->unset_userdata($arreglo_sesiones_propietario);
//                $this->session->sess_destroy();
//                //echo '<script languaje="javascript" type="text/javascript">window.close();</script>';
//                redirect(base_url() . "login", 'refresh');
//            } catch (Exception $e) {
//                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//            }
//        }
//        else{
//            $arreglo_sesiones_propietario = array(
//                'idprop' => FALSE,
//                'nombre' => FALSE,
//                'ap' => FALSE,
//                'am' => FALSE,
//                'curprfc' => FALSE,
//                'telefono' => FALSE,
//                'empresa' => FALSE,
//                'correousu' => FALSE,
//                'monto' => FALSE,
//                'is_login' => FALSE
//            );
//            $this->session->unset_userdata($arreglo_sesiones_propietario);
//            $this->session->sess_destroy();
//            redirect(base_url() . "login", 'refresh');
//        }
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/app/logout.php */
