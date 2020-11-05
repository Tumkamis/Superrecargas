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
        $data = json_decode($_POST[''], true);
        $arr_msjc = array();
        $arr_msjc['certComercioProveedor'] = $data['cadenaInformacion']['certComercioProveedor'];
        $arr_msjc['celularCliente'] = $data['cadenaInformacion']['celularCliente'];
        $arr_msjc['digitoVerificadorCliente'] = $data['cadenaInformacion']['digitoVerificadorCliente'];
        $arr_msjc['nombreCliente'] = $data['cadenaInformacion']['nombreCliente'];
        $arr_msjc['claveInstitucionCliente'] = $data['cadenaInformacion']['claveInstitucionCliente'];
        $arr_msjc['tipoCuentaCliente'] = $data['cadenaInformacion']['tipoCuentaCliente'];
        $arr_msjc['numeroCuentaCliente'] = $data['cadenaInformacion']['numeroCuentaCliente'];
        $arr_msjc['idMensajeCobro'] = $data['cadenaInformacion']['idMensajeCobro'];
        $arr_msjc['concepto'] = $data['cadenaInformacion']['concepto'];
        $arr_msjc['monto'] = $data['cadenaInformacion']['monto'];
        $arr_msjc['claveRastreo'] = $data['cadenaInformacion']['claveRastreo'];
        $arr_msjc['resultadoMensajeCobro'] = $data['cadenaInformacion']['resultadoMensajeCobro'];
        $arr_msjc['horaSolicitudMensajeCobro'] = $data['cadenaInformacion']['horaSolicitudMensajeCobro'];
        $arr_msjc['horaProcMensajeCobro'] = $data['cadenaInformacion']['horaProcMensajeCobro'];
        $arr_msjc['certBdeM'] = $data['cadenaInformacion']['certBdeM'];
        $arr_msjc['horaEnvioMensaje'] = $data['cadenaInformacion']['horaEnvioMensaje'];
        
        $arr_msjc['selloDigital'] = $data['selloDigital'];
        
        //echo $arr_msjc['selloDigital'];
        post_msj($arr_msjc);
        
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json");
        $datos = array();
        $datos['resultado'] = 0;
        echo json_encode($datos);
    }
}
