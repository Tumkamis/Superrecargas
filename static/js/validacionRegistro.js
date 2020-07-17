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
        var correo = document.getElementById("email").value;
//        var tel1=document.getElementById("telefono1").value;
//        tel1.value = (this.value + '').replace(/[^0-9]/g, '');
//        $("#telefono1").val(tel1);
//        var tel2=document.getElementById("telefono2").value;
//        tel2.value = (this.value + '').replace(/[^0-9]/g, '');
//        $("#telefono2").val(tel2);
        if (validar('telefono1') == false || validar('telefono2')==false || validar('tipo')==false || validar('email')==false || validar('instituciones')==false) {

            swal({
                title: "Alerta",
                text: "Sus campos no estan validados.",
                type: "warning"
            });

            return false;

        } else {

//            swal({
//                title: "Registro",
//                text: "Se le enviara un correo a: "+correo+" con su contraseña para acceder, para terminar el proceso presione OK",
//                type: "success"
//            },
//            function () {
//                $('#form').submit();
//            }
//            );
            addcuenta();
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
    
    $("#tipo").change(function () {
        validar('tipo');
    });
    
    $("#email").keyup(function () {
        validar('email');
    });
    
    $("#instituciones").change(function () {
        validar('instituciones');
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
        
        if (input === 'tipo') {
            var tipo = document.getElementById("tipo").value;
            if (tipo === '---Seleccione---') {
                $("#iconotexto").remove();
                $("#tipo").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#tipo").parent().children("span").text("Debe seleccionar una opción.").show();
                $("#tipo").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#tipo").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#tipo").parent().children("span").text("").hide();
                $("#tipo").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
                return true;
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
        
        if (input === 'instituciones') {
            var tipo = document.getElementById("instituciones").value;
            if (tipo === 'Selecciona') {
                $("#iconotexto").remove();
                $("#instituciones").parent().parent().attr("class", "form-group has-error has-feedback");
                $("#instituciones").parent().children("span").text("Debe seleccionar una opción.").show();
                $("#instituciones").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
                return false;
            } else {
                $("#iconotexto").remove();
                $("#instituciones").parent().parent().attr("class", "form-group has-success has-feedback");
                $("#instituciones").parent().children("span").text("").hide();
                $("#instituciones").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");
                return true;
            }
        }
    }
    
    function addcuenta() {
        var correo = document.getElementById("email").value;
        var idinstitucion = document.getElementById("instituciones").value;
        var telefono = document.getElementById("telefono1").value;
        $.ajax({
            url: "https://superrecarga.com.mx/Superrecarga/registro/registro_post",
            type: "post",
            dataType: "json",
            data: $("#form").serialize(),
            success: function (json) {
                swal({
                    title: "Registro",
                    text: "Se le enviara un correo a: "+correo+" con su contraseña para acceder, por favor revise la bandeja de entrada o la de spam",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    cancelButtonColor: "#687DF7",
                    confirmButtonText: "Reenviar",
                    cancelButtonText: "Recibido",
                    closeOnConfirm: false,
                    closeOnCancel: false},
                    function (isConfirm) {
                        if(isConfirm){
                            //location.href = "../usuario/beneficiario/eliminar/"+elem.attr('data-id');
                            $.ajax({
                                url: "https://superrecarga.com.mx/Superrecarga/registro/reenviarcorreo",
                                type: "post",
                                dataType: "json",
                                data: {
                                    idinstitucion: idinstitucion,
                                    correo: correo,
                                    telefono: telefono
                                },
                                success: function (json) {
                                    alert("Reenviado");
//                                    swal({
//                                        title: "Reenviado",
//                                        text: "",
//                                        type: "success"
//                                    });
                                },
                                error: function (a,b,c){
                                    alert("No se reenvio intentelo más tarde" + c);
                                }
                            });
                        }
                        else{
                            location.href = "https://superrecarga.com.mx/login";
                        }
                });
            },
            error: function (a,b,c){
                //alert("No Agregado " + c);
                swal({
                    title: "Alerta",
                    text: "Es posible que el número que intenta ingresar ya este registrado, por favor verifique los datos",
                    type: "warning"
                });
            }
        });
    }
});
