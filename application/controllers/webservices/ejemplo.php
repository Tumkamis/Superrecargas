<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ejemplo
 *
 * @author marioeduardo
 */
class ejemplo extends CI_Controller{
    //put your code here
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    
    public function index() {
        //$data = json_decode($_POST['d'], true);
        $_POST = json_decode(file_get_contents('php://input'), true);
        $arr_ejemplo = array();
        $arr_ejemplo['nombre'] = $_POST['nombre'];
        $arr_ejemplo['apellido'] = $_POST['apellido'];
        $folio=post_ejemplo($arr_ejemplo);
        
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json");
        $datos = array();
        $datos['resultado'] = 0;
        $datos['folio'] = $folio;
        echo json_encode($datos);
    }
}
