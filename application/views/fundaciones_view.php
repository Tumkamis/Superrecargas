<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Page title -->
        <title><?= $titulo ?></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->


        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
        <link rel="shortcut icon" href="<?= base_url() ?>static/Logotipo-Super-Recarga-R.png" type="image/x-icon">
        <link rel="icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <script src="<?= base_url() ?>static/js/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= base_url() ?>static/js/validacionRegistroGET.js"></script>
        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/bootstrap/dist/css/bootstrap.css" />

        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/toastr/build/toastr.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/select2-3.5.2/select2.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/select2-bootstrap/select2-bootstrap.css" />
        <link href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css">
        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/loader.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">
        <!-- stylios y scrips para visualizar los documentos
        -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body class="blank" style="background-image: url('<?= base_url() ?>static/backgraundmorado.jpg');">
        <!-- color-line START -->
        <!--<div class="color-line"></div>-->
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group" style="text-align:center;">
                    <img src="<?= base_url() ?>static/pleca2Recurso 1.png">
                </div>
            </div>
            <!--            <div class="col-lg-12">
                            <div class="form-group">
                                <img src="<?= base_url() ?>static/Logotipo-Super-Recarga-R.png" width="150" height="170">
                                <label style="color: white; font-size: 6rem;">FUNDACIONES</label>
                            </div>
                            <img src="<?= base_url() ?>static/Logotipo-Super-Recarga-R.png" width="150" height="170">
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="text-align:left; font-size: 6rem;">
                                <label style="color: white;">FUNDACIONES</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <br>
                            </div>
                        </div>-->
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group" style="text-align:center;">
                    <img src="<?= base_url() ?>static/pleca2Recurso 5.png" width="650" height="450">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group" style="text-align:center;">
                    <img src="<?= base_url() ?>static/pleca2Recurso 6.png" width="650" height="450">
                </div>
            </div>
<!--            <div class="col-lg-6">
                <div class="form-group">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3><ins>TU FUNDACIÓN REQUIERE INGRESOS:</ins></h3></label>
                </div>
                <div class="form-group">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>¿ RECURRENTES ?</h3></label>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>¿ NO ETIQUETADOS ?</h3></label>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>¿ DE LARGO PLAZO ?</h3></label>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>Y</h3></label>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>¿ CRECIENTES ?</h3></label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label style="color: white;"><h3><ins>AHORA, CON SÚPERRECARGA TODOS TUS:</ins></h3></label>
                </div>
                <div class="form-group">
                    <label style="color: white;"><h3>BENEFICIARIOS</h3></label>
                    <br>
                    <label style="color: white;"><h3>DONANTES</h3></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>FAMILIARES</h3></label>
                    <br>
                    <label style="color: white;"><h3>EMPLEADOS</h3></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color: white;"><h3>+</h3></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>Y</h3></label>
                    <br>
                    <label style="color: white;"><h3>VOLUNTARIOS</h3></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label style="color: white;"><h3>AMIGOS</h3></label>
                    <br>
                    <label style="color: white;"><h3>PROVEEDORES</h3></label>
                    <br>
                    <br>
                    <label style="color: white;"><h3>PUEDEN AHORRAR Y $$ AYUDARTE $$ CON CADA RECARGA CELULAR</h3></label>
                </div>
            </div>-->
        </div>
        <br>
        <div class="row">
            <div class="form-group " style="text-align:center;">
                <div class="col-lg-12">
                    <a class="btn btn-default" style="border-color: #e37609; color: white; background-color: #e37609;" href="<?= base_url() ?>fundaciones/registro" ><h5>Regístrate aquí para recibir toda la información</h5></a>
                </div>
            </div>
        </div>

        <!-- login-container END -->

        <!-- Vendor scripts -->
        <script src="<?= base_url() ?>static/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-flot/jquery.flot.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-flot/jquery.flot.resize.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-flot/jquery.flot.pie.js"></script>
        <script src="<?= base_url() ?>static/vendor/flot.curvedlines/curvedLines.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery.flot.spline/index.js"></script>
        <script src="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/iCheck/icheck.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/peity/jquery.peity.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/sparkline/index.js"></script>


        <script src="<?= base_url() ?>static/vendor/select2-3.5.2/select2.min.js"></script>

        <script src="<?= base_url() ?>static/vendor/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-bs/js/dataTables.bootstrap.js"></script>

        <!-- DataTables buttons scripts -->
        <script src="<?= base_url() ?>static/vendor/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>

        <!--Alertas scripts-->
        <script src="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.js"></script>
        <script src="<?= base_url() ?>static/vendor/toastr/build/toastr.min.js"></script>

        <!-- App scripts -->
        <script src="<?= base_url() ?>static/scripts/homer.js"></script>
        <script src="<?= base_url() ?>static/scripts/app/libs/common.js"></script>

        <script type="text/javascript">
            function base_url() {
                return "<?= base_url() ?>";
            }

            jQuery(document).ready(function ($) {
                loading();
                $(".js-source-states").select2();
                $(".js-source-states-2").select2();
            });
        </script>

        <script src="<?= base_url() ?>static/scripts/charts.js"></script>

        <script>
            $(function () {
                //$(".js-source-states").select2();
                //$(".js-source-states-2").select2();
            });
        </script>

        <!--validacion de contraseña -->

    </body>
</html>
