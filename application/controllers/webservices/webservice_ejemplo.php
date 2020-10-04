<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of webservice_ejemplo
 *
 * @author marioeduardo
 */
header("Content-Type:application/json"); 
class webservice_ejemplo  extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('propietario_model');
    }
    
    public function index() {
        $telefono=$this->input->post('telefono');
        
        $datospropietario = $this->propietario_model->info_propietario($telefono);
        
        $response=array();
//        $response['success']=false;
//        
//        while($datospropietario!=NULL){
//            $response['success']=true;
//            $response['idpropietario']=$datospropietario->idpropietario;
//            $response['nombre']=$datospropietario->nombre;
//            $response['apellido1']=$datospropietario->apellido1;
//            $response['apellido2']=$datospropietario->apellido2;     
//        }
        
        if(!is_null($datospropietario)){
            $response['success']=true;
            $response['idpropietario']=$datospropietario->idpropietario;
            $response['nombre']=$datospropietario->nombre;
            $response['apellido1']=$datospropietario->apellido1;
            $response['apellido2']=$datospropietario->apellido2; 
        }
        else{
            $response['success']=false;
        }
        
        echo json_encode($response);
    }
}
