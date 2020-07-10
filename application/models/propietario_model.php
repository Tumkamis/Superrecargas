<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of propietario_model
 *
 * @author marioeduardo
 */
class propietario_model extends CI_Model {
    
    public function info_propietario($telefono) {
        $cmd="select * from propietario where telefono like '$telefono'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function insertar($arr) {
        $this->db->insert('propietario', $arr);
        return TRUE;
    }
    
    public function tipo_instituciones() {
        $cmd="select * from tipoinstitucion where estatus=1";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_instituciones($tipo) {
        $cmd="select * from institucion where tipo='$tipo' and estatus=1";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function ruta_img($id) {
        $cmd="select img from institucion,propietario where propietario.idinstitucion=institucion.idinstitucion and propietario.idpropietario='$id'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function ruta_img_correo($id) {
        $cmd="select img from institucion where idinstitucion='$id'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
}
