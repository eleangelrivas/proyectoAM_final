<?php 
    @session_start(); 
    $_SESSION['bloquear_pantalla']="si";

 ?>

<?php include '../../layouts/header.php'; ?>

<?php include '../../layouts/headerStyle.php'; ?>

    <body class="fixed-left">

        <?php include '../../layouts/loader.php'; ?>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.php" class="logo logo-admin"><img src="../../public/assets/images/logo.png" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="font-18 m-b-5 text-center">Bloqueo de pantalla</h4>
                        <p class="text-muted text-center">Hola para desbloquear la pantalla ingresa tu contraseña</p>

                        <form class="form-horizontal m-t-30" id="formulario_desbloqueo1" name="formulario_desbloqueo1" >
                            <input type="hidden" name="desbloquear" value="si_con_contrasena">
                            <div class="user-thumb text-center m-b-30">
                                <img src="../../public/assets/images/users/avatar-1.jpg" class="rounded-circle img-thumbnail" alt="thumbnail">
                                <h6><?php print $_SESSION['nombre'] ?></h6>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Desbloquear</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

             

        </div>

        <?php include '../../layouts/footerScript.php'; ?>

        <!-- App js -->
        <script src="../../public/assets/js/app.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="funciones_ingreso.js" type="text/javascript" charset="utf-8" async defer></script>

    </body>
</html>