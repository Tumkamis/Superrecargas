<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title><?= $titulo ?></title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>static/Logotipo-Super-Recarga-R.png" type="image/x-icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,user-scalable=0, minimum-scale=1,maximum-scale=1"/>
        <meta name="description" content="LoginView">
        <meta name="author" content="Raul Zavaleta <raul.zavaletazea@gmail.com at kiapp.mx>">
        
        <script src="<?= base_url()?>static/js/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url()?>static/vendor/sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= base_url()?>static/js/login.js"></script>
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
    </head>
    <body class="blank" style="background-image: url('<?=  base_url()?>static/backgraund.jpg');">

        <!-- color-line START -->
        <div class="color-line"></div>
        <ul class="nav navbar-nav">
<!--            <li><a href="<?= base_url()?>inicio">INICIO</a></li>-->
        </ul>
        <!-- login-container START -->
        <div class="login-container">
            <!-- row START -->
            <div class="row">
                <!-- col-md-12 START -->
                <div class="col-md-12">
                    <!-- text-center m-b-mb START -->
                    <!--<div class="text-center m-b-md">
                        <h3>AIDE</h3>
                        <small>Inicia sesion</small>
                    </div>-->
                    <div class="text-center m-b-md">
                        <img src="<?= base_url()?>static/Logotipo-Super-Recarga-R.png" alt="" class="img-responsive" style="display: block; margin: auto;" />
                        <h3 style="color: white;"><?= $titulo ?></h3>
                        <!--<small></small>-->
                    </div>
                    <!-- text-center m-b-mb END -->
                    <!-- hpanel START -->
                    <div class="hpanel">
                        <!-- panel-body START -->
                        <div class="panel-body" style="background-color: #F2F2F2;">
                            <!-- form START -->
                            <div class="row">
                            <form action="<?= base_url() ?>auth" method="post" id="loginForm">
                                <div class="form-group">
                                    <label><h5>*Campos obligatorios</h5></label>
                                    <br>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                    <label class="control-label" for="username" style="color: blue;">N??mero celular (10 d??gitos)*:</label>
                                    <input type="text" placeholder="*Campo obligatorio" title="Por favor ingresa tu n??mero celular" value="" name="username" id="username" class="form-control" maxlength="10">
                                    <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                    <label class="control-label" for="password" style="color: blue;">Contrase??a:</label>
                                    <input type="password" title="Por favor ingresa tu contrase??a" placeholder="******" value="" name="password" id="password" class="form-control">
                                    <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed">

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary btn-block" type="button" id="correoEnviado" name="correoEnviado">
                                            <i class="fa fa-sign-in"></i> Iniciar sesi??n
                                        </button>
                                    </div>
                                </div>
                                
<!--                                <button class="btn btn-primary btn-block" type="button" id="correoEnviado" name="correoEnviado">
                                    <i class="fa fa-sign-in"></i> Iniciar sesi??n
                                </button>-->
                                <a class="text-primary text-right btn-block loader-link" href="<?= base_url() ?>registro" style="margin-top: 25px;">??No tiene una cuenta? Por favor reg??strese </a>

                                <!--<a class="text-primary text-right btn-block" style="margin-top: 5px;" href="usuario/recuperar_password">??Olvid?? su contrase??a? Recuperela aqu??</a>

                                <small class="btn-block text-right" style="margin-top: 5px;">
                                    ??Tiene problemas para acceder, por favor contacte al <a class="text-primary" href="#">Administrador</a>?
                                </small>-->
                            </form>
                            <!-- form END -->
                            </div>
                        </div>
                        <!-- panel-body END -->
                    </div>
                    <!-- hpanel END -->
                </div>
                <!-- col-md-12 END -->
            </div>
            <!--row END -->

<!--            <div class="row">
                <div class="col-md-12 text-center">
                    <strong><?= app_title() ?></strong><br /><?= app_name() ?> <br/> <?= date("Y") ?>. Todos los Derechos Reservados <br />
                    <br /> <small>Desarrollado por <a href="http://cidtai.uteq.edu.mx">CIDTAI - UTEQ</a></small>
                </div>
            </div>-->
        </div>
            <!--<div class="jumbotron">-->
<!--                <form class="row" method="post" action="login/auth">
                    <div class="col-sm-12">
                        <h3 class="text-center">Iniciar Sesi??n</h3>
                    </div>
                    
                    <div class="col-sm-12 text-center" style="margin-bottom: 20px;">
                        <img src="<?= base_url()?>static/assets/img/ninja.png" 
                             alt="Iniciar sesi??n" 
                             class="img img-circle"
                             style="margin: auto !important;" />
                    </div>
                             
                     Mensaje de error 
                    <% if (request.getAttribute("error") != null) { %>
                        <div class="col-sm-4 col-sm-offset-4">
                            <div class="alert alert-danger fade in alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert">x</a>
                                <strong>??Error!</strong> 
                                <%=request.getAttribute("error")%>
                            </div>
                        </div>
                    <% } %>
                     **************** 
                    
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <input type="text" 
                                   name="username" 
                                   id="username" 
                                   class="form-control" 
                                   placeholder="Usuario" 
                                   value="admin@admin.com"
                                   required />
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control" 
                                   placeholder="Contrase??a" 
                                   value="1234ABCD"
                                   required />
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <button class="btn btn-warning" type="submit">
                                Iniciar Sesi??n
                            </button>
                        </div>
                    </div>
                </form>-->
<!-- form START -->
    </body>
</html>
