<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resultadoOperaciones
 *
 * @author marioeduardo
 */
class resultadoOperaciones extends CI_Controller{
    //put your code here
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    
    public function index() {
        //$data = json_decode($_POST['d'], true);
        $_POST = json_decode(file_get_contents('php://input'), true);
        $arr_msjc = array();
        $arr_msjc['certComercioProveedor'] = $_POST['cadenaInformacion']['certComercioProveedor'];
        $arr_msjc['celularCliente'] = $_POST['cadenaInformacion']['celularCliente'];
        $arr_msjc['digitoVerificadorCliente'] = $_POST['cadenaInformacion']['digitoVerificadorCliente'];
        $arr_msjc['nombreCliente'] = $_POST['cadenaInformacion']['nombreCliente'];
        $arr_msjc['claveInstitucionCliente'] = $_POST['cadenaInformacion']['claveInstitucionCliente'];
        $arr_msjc['tipoCuentaCliente'] = $_POST['cadenaInformacion']['tipoCuentaCliente'];
        $arr_msjc['numeroCuentaCliente'] = $_POST['cadenaInformacion']['numeroCuentaCliente'];
        $arr_msjc['idMensajeCobro'] = $_POST['cadenaInformacion']['idMensajeCobro'];
        $arr_msjc['concepto'] = $_POST['cadenaInformacion']['concepto'];
        $arr_msjc['monto'] = $_POST['cadenaInformacion']['monto'];
        $arr_msjc['claveRastreo'] = $_POST['cadenaInformacion']['claveRastreo'];
        $arr_msjc['resultadoMensajeCobro'] = $_POST['cadenaInformacion']['resultadoMensajeCobro'];
        $arr_msjc['horaSolicitudMensajeCobro'] = $_POST['cadenaInformacion']['horaSolicitudMensajeCobro'];
        $arr_msjc['horaProcMensajeCobro'] = $_POST['cadenaInformacion']['horaProcMensajeCobro'];
        $arr_msjc['certBdeM'] = $_POST['cadenaInformacion']['certBdeM'];
        $arr_msjc['horaEnvioMensaje'] = $_POST['cadenaInformacion']['horaEnvioMensaje'];
        
        $arr_msjc['selloDigital'] = $_POST['selloDigital'];
        
        //echo $arr_msjc['selloDigital'];
        post_msj($arr_msjc);
        
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json");
        $datos = array();
        $datos['resultado'] = 0;
        echo json_encode($datos);
    }
}
