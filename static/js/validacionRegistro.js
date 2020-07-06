/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Otro cambio
jQuery(document).ready(function ($) {
    //select de los municipios a partir de los estados
    
    $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });
    
    $("#tipo").change(function () {
        $("#tipo option:selected").each(function () {
            institucion = $('#tipo').val();
            $.post("https://superrecarga.com.mx/registro/buscar_institucion", {
                tipo: institucion
            }, function (data) {
                $("#instituciones").html(data);
            });
        });
    });
    
    $('#correoEnviado').click(function () {
//        var tel1=document.getElementById("telefono1").value;
//        tel1.value = (this.value + '').replace(/[^0-9]/g, '');
//        $("#telefono1").val(tel1);
//        var tel2=document.getElementById("telefono2").value;
//        tel2.value = (this.value + '').replace(/[^0-9]/g, '');
//        $("#telefono2").val(tel2);
        if (validar('telefono1') == false || validar('telefono2')==false) {
            return false;

        } else {
            swal({
                title: "Registro",
                text: "Se registro de manera exitosa, se le enviara un correo con su contraseña para acceder",
                type: "success"
            },
            function () {
                //location.href = "../login";
                $("#form").submit();
            });
            return false;
        }

    });
    
    $("#telefono1").keyup(function () {
        validar('telefono1');
    });
    
    $("#telefono2").keyup(function () {
        var valorinput = $('#telefono2').val().toUpperCase();
        $('#telefono2').val(valorinput);
        if ($("#telefono2").val().length > 0) {
            validar('telefono2');
        }

        else {
            $("#telefono2").parent().removeClass('has-error');
            $("#telefono2").parent().removeClass('has-feedback');
        }

    });
    
    function validar(input){
        if(input==="telefono1"){
            var telefono1 = document.getElementById("telefono1").value;
            if (telefono1 === null || telefono1.length == 0 || /^\s+$/.test(telefono1) || telefono1 == "") {
                $("#iconotexto").remove();
                $("#telefono1").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono1").parent().children("span").text("Debe ingresar el telefono").show();
                $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (isNaN(telefono1)) {
                $("#iconotexto").remove();
                $("#telefono1").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono1").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
                $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (telefono1.length != 10) {
                $("#iconotexto").remove();
                $("#telefono1").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono1").parent().children("span").text("El telefono debe ser de 10 digitos").show();
                $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }


            else {
                $("#iconotexto").remove();
                $("#telefono1").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#telefono1").parent().children("span").text("").hide();
                $("#telefono1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                return true;
            }
        }
        if(input==="telefono2"){
            var telefono1 = document.getElementById("telefono1").value;
            var telefono2 = document.getElementById("telefono2").value;
            if (telefono2 === null || telefono2.length == 0 || /^\s+$/.test(telefono2) || telefono2 == "") {
                $("#iconotexto").remove();
                $("#telefono2").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono2").parent().children("span").text("Debe ingresar el telefono").show();
                $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (isNaN(telefono2)) {
                $("#iconotexto").remove();
                $("#telefono2").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono2").parent().children("span").text("No se aceptan letras o caracteres especiales.").show();
                $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (telefono2.length != 10) {
                $("#iconotexto").remove();
                $("#telefono2").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono2").parent().children("span").text("El telefono debe ser de 10 digitos").show();
                $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (telefono1 !== telefono2) {
                $("#iconotexto").remove();
                $("#telefono2").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#telefono2").parent().children("span").text("Los números telefonicos deben ser iguales").show();
                $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            }
            else if (telefono1 == telefono2) {
                $("#iconotexto").remove();
                $("#telefono2").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#telefono2").parent().children("span").text("").hide();
                $("#telefono2").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

                return true;
            }
        }
    }
});
