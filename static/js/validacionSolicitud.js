/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {
    $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    
    $('#correoEnviado').click(function () {
        if (validar('nomfudacion') == false || validar('nomresponsable')==false || validar('email')==false || validar('telefonocel')==false || validar('telefonoofc')==false) {
            swal({
                title: "Alerta",
                text: "Sus campos no estan validados.",
                type: "warning"
            });

            return false;
        }
        else{
            addcuenta();
            return false;
        }
    });
    
    $("#nomfudacion").keyup(function () {
        validar('nomfudacion');
    });
    $("#nomresponsable").keyup(function () {
        validar('nomresponsable');
    });
    $("#email").keyup(function () {
        validar('email');
    });
    $("#telefonocel").keyup(function () {
        validar('telefonocel');
    });
    $("#telefonoofc").keyup(function () {
        validar('telefonoofc');
    });
    
    function validar(input){
        if (input === 'nomfudacion') {
            var nomfudacion = document.getElementById("nomfudacion").value;
            if (nomfudacion === null || nomfudacion.length == 0 || /^\s+$/.test(nomfudacion) || nomfudacion == "") {
                $("#iconotexto").remove();
                $("#nomfudacion").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#nomfudacion").parent().children("span").text("Debe ingresar el nombre.").show();
                $("#nomfudacion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            ///^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i
            ///^\w+$/i

            else {
                var espacever=nomfudacion.charAt(nomfudacion.length-1);
                if(espacever==' '){
                    $("#iconotexto").remove();
                    $("#nomfudacion").parent().parent().attr("class", "form-group has-error has-feedback");
                    $("#nomfudacion").parent().children("span").text("Existe un espacio al final.").show();
                    $("#nomfudacion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                    return false;
                }
                else{
                    $("#iconotexto").remove();
                    $("#nomfudacion").parent().parent().attr("class", "form-group has-success has-feedback");
                    $("#nomfudacion").parent().children("span").text("").hide();
                    $("#nomfudacion").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                    return true; 
                }
            }
        }
        
        if (input === 'nomresponsable') {
            var nomresponsable = document.getElementById("nomresponsable").value;
            if (nomresponsable === null || nomresponsable.length == 0 || /^\s+$/.test(nomresponsable) || nomresponsable == "") {
                $("#iconotexto").remove();
                $("#nomresponsable").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#nomresponsable").parent().children("span").text("Debe ingresar el nombre.").show();
                $("#nomresponsable").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            ///^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i
            ///^\w+$/i

            else {
                var espacever=nomresponsable.charAt(nomresponsable.length-1);
                if(espacever==' '){
                    $("#iconotexto").remove();
                    $("#nomresponsable").parent().parent().attr("class", "form-group has-error has-feedback");
                    $("#nomresponsable").parent().children("span").text("Existe un espacio al final.").show();
                    $("#nomresponsable").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                    return false;
                }
                else{
                    $("#iconotexto").remove();
                    $("#nomresponsable").parent().parent().attr("class", "form-group has-success has-feedback");
                    $("#nomresponsable").parent().children("span").text("").hide();
                    $("#nomresponsable").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                    return true; 
                }
            }
        }
        
        if (input === 'email') {
            var correo1 = document.getElementById("email").value;
            if (!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo1)) && correo1.length > 0) {
                $("#iconotexto").remove();
                $("#email").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#email").parent().children("span").text("Ingresar un correo valido").show();
                $("#email").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (correo1.length === 0 || correo1 == "") {
                $("#iconotexto").remove();
                $("#email").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#email").parent().children("span").text("Ingresar correo").show();
                $("#email").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else {
                $("#iconotexto").remove();
                $("#email").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#email").parent().children("span").text("").hide();
                $("#email").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                return true;
            }
        }
        
        if(input==="telefonocel"){
            var telefonocel = document.getElementById("telefonocel").value;
            if (telefonocel === null || telefonocel.length == 0 || /^\s+$/.test(telefonocel) || telefonocel == "") {
                $("#iconotexto").remove();
                $("#telefonocel").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefonocel").parent().children("span").text("Debe ingresar el telefono").show();
                $("#telefonocel").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (isNaN(telefonocel)) {
                $("#iconotexto").remove();
                $("#telefonocel").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefonocel").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
                $("#telefonocel").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (telefonocel.length != 10) {
                $("#iconotexto").remove();
                $("#telefonocel").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefonocel").parent().children("span").text("El telefono debe ser de 10 digitos").show();
                $("#telefonocel").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }


            else {
                $("#iconotexto").remove();
                $("#telefonocel").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#telefonocel").parent().children("span").text("").hide();
                $("#telefonocel").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                return true;
            }
        }
        
        if(input==="telefonoofc"){
            var telefonoofc = document.getElementById("telefonoofc").value;
            if (telefonoofc === null || telefonoofc.length == 0 || /^\s+$/.test(telefonoofc) || telefonoofc == "") {
                $("#iconotexto").remove();
                $("#telefonoofc").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefonoofc").parent().children("span").text("Debe ingresar el telefono").show();
                $("#telefonoofc").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (isNaN(telefonoofc)) {
                $("#iconotexto").remove();
                $("#telefonoofc").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefonoofc").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
                $("#telefonoofc").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (telefonoofc.length != 10) {
                $("#iconotexto").remove();
                $("#telefonoofc").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefonoofc").parent().children("span").text("El telefono debe ser de 10 digitos").show();
                $("#telefonoofc").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }


            else {
                $("#iconotexto").remove();
                $("#telefonoofc").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#telefonoofc").parent().children("span").text("").hide();
                $("#telefonoofc").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                return true;
            }
        }
    }
    
    function addcuenta() {
        $.ajax({
            //url: "http://localhost/SuperrecargaLocal/fundaciones/registro_post",
            url: "http://superrecarga.com.mx/Superrecarga/fundaciones/registro_post",
            type: "post",
            dataType: "json",
            data: $("#form").serialize(),
            success: function (json) {
                swal({
                    title: "Enviado",
                    text: "Nos comunicaremos contigo en breve...",
                    type: "success"
                },
                function () {
                    //location.href = "http://localhost/SuperrecargaLocal/fundaciones/registro";
                    location.href = "http://superrecarga.com.mx/Superrecarga/fundaciones/registro";
                });
//                document.getElementById("nomfudacion").value = "";
//                document.getElementById("nomresponsable").value = "";
//                document.getElementById("email").value = "";
//                document.getElementById("telefonocel").value = "";
//                document.getElementById("telefonoofc").value = "";
            },
            error: function (a,b,c){
                //alert("No Agregado " + c);
                swal({
                    title: "Alerta",
                    text: "Ocurrio un error intentelo más tarde",
                    type: "warning"
                });
            }
        });
    }
});