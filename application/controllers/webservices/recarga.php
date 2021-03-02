<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recarga
 *
 * @author marioeduardo
 */
class recarga extends CI_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    
    public function index() {
        //$data = json_decode($_POST['d'], true);
        date_default_timezone_set('America/Mexico_City');
        $_POST = json_decode(file_get_contents('php://input'), true);
        $arr_recarga = array();
        $arr_recarga['numero'] = $_POST['numero'];
        $arr_recarga['digito'] = $_POST['digito'];
        $arr_recarga['numero1'] = $_POST['numero1'];
        $arr_recarga['digito1'] = $_POST['digito1'];
        $arr_recarga['timestamp'] = date('Y-m-d H:i:s');
        post_recarga($arr_recarga);

        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json");
        $datos = array();
        $datos['resultado'] = 0;
        echo json_encode($datos);
    }
}
