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
class recargamas extends CI_Controller{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    
    public function index() {
        //$data = json_decode($_POST['d'], true);
        date_default_timezone_set('America/Mexico_City');
        $_POST = json_decode(file_get_contents('php://input'), true);
        $arr_recargamas = array();
        $arr_recargamas['numero'] = $_POST['numero'];
        $arr_recargamas['digito'] = $_POST['digito'];
        $arr_recargamas['numero1'] = $_POST['numero1'];
        $arr_recargamas['digito1'] = $_POST['digito1'];
        $arr_recargamas['timestamp'] = date('Y-m-d H:i:s');
        post_recargamas($arr_recargamas);

        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json");
        $datos = array();
        $datos['resultado'] = 0;
        echo json_encode($datos);
    }
}
