<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author marioeduardo
 */
class login extends CI_Controller{
    //put your code here
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    
    public function index() {
        $_POST = json_decode(file_get_contents('php://input'), true);
        $telefono= $_POST['telefono'];
        $password= $_POST['pas'];
        $respuesta=login();
        
        echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
        
//        if ($respuesta != NULL) {
//            header("HTTP/1.1 200 OK");
//            echo json_encode($respuesta);
//            exit();
//        } else {
//            header("HTTP/1.1 400 Bad Request");
//            echo json_encode($respuesta);
//            exit();
//        }
    }
}
