
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
                        <h4 class="font-18 m-b-5 text-center">Bienvenido</h4>
                        <p class="text-muted text-center">Para iniciar ingrese sus credenciales.</p>

                        <form class="form-horizontal m-t-30" id="formulario_login">
                            <input type="hidden" name="iniciar_sesion" value="si_nueva">
                            <div class="form-group">
                                <label for="correo">Correo o usuario</label>
                                <input type="text" autocomplete="off" name="correo" class="form-control" id="correo" placeholder="Ingrese su correo">
                            </div>

                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-sm-6">
                                     
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button   class="btn btn-primary w-md waves-effect waves-light" type="submit">Iniciar sesión</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="javascript:void(0)" class="text-muted"><i class="mdi mdi-lock"></i> Recuperar tu contraseña</a>
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