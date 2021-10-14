<?php include '../../layouts/header.php'; ?>

<?php include '../../layouts/headerStyle.php'; ?>
<style type="text/css" media="screen">
    .hiden{
        display: none;
    }
    .mostrar{
        display: block;
    }
</style>
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
                        <h4 class="font-18 m-b-5 text-center">Recuperar contraseña</h4>
                        <p class="text-muted text-center">Ingrese su DUI para recuparar la contraseña</p>

                        <form class="form-horizontal m-t-30" id="validar_dui">
                            <input type="hidden" name="validando_dui" value="si_validalo">
                            <div class="form-group">
                                <label for="dui">DUI</label>
                                <input autocomplete="off" type="text"  required data-parsley-required-message="El DUI es requerido" class="form-control" id="dui" name="dui" placeholder="Ingrese su DUI">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Validar</button>
                                </div>
                            </div>

                        </form>


                        <form class="hiden form-horizontal m-t-30" id="actualizar_pass">
                            <input type="hidden" name="validar_nuevo_pass" value="si_actualizalo">
                            <input type="hidden" name="id_persona" id="id_persona">
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password"  required data-parsley-required-message="Campo requerido" autocomplete="off" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña">
                            </div>

                             <div class="form-group">
                                <label for="recontrasena">Repita su c ontraseña</label>
                                <input type="password" autocomplete="off" required data-parsley-required-message="Campo requerido" class="form-control" id="recontrasena" name="recontrasena" placeholder="Repita su contraseña">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Validar</button>
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
        <script>
            $("#validar_dui").parsley();
            $("#actualizar_pass").parsley();
        </script>
        <script src="funciones_ingreso.js" type="text/javascript" charset="utf-8" async defer></script>

    </body>
</html>