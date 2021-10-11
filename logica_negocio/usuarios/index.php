<?php include '../../layouts/header.php'; ?>
<!-- C3 charts css -->
<link href="../../public/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
<link href="../../public/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
 <link href="../../public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<?php include '../../layouts/headerStyle.php'; ?>
<style>
    
    div#registrar_usuario {
        cursor: pointer;
    }
    .error_modificado li.parsley-required {
        position: absolute;
        margin-top: 42px;
        margin-left: -330px;
    }
</style>
<body class="fixed-left">

    <?php include '../../layouts/loader.php'; ?>

    <!-- Begin page -->
    <div id="wrapper">

    <?php include '../../layouts/navbar.php'; ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <?php include '../../layouts/topbar.php'; ?>
                 

                <!-- ==================
                     PAGE CONTENT START
                     ================== -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-6 col-xl-6" >
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-account-multiple"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-purple" id="cantidad_usuarios">25140</span>
                                        Usuarios registrados
                                    </div>
                                    <div class="clearfix"></div>
                                     
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6" id="registrar_usuario">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-account-multiple-plus"></i></span>
                                    <div class="mini-stat-info">
                                        <span class="counter text-blue-grey">Registrar</span>
                                        Nuevo usuario
                                    </div>
                                    <div class="clearfix"></div>
                                     
                                </div>
                            </div>
                             
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body" id="datos_tabla">
 

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                         

                        

                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <?php include '../../layouts/footer.php'; ?>

            <!-- aca las modales-->
   
            <div class="modal fade" id="md_registrar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      
                     <form name="formulario_registro" id="formulario_registro">
                        <input type="hidden" name="ingreso_datos" value="si_registro">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" autocomplete="off" name="nombre" data-parsley-required-message="El nombre es requerido" id="nombre" class="form-control" required placeholder="Ingrese su nombre"/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" autocomplete="off" name="email" data-parsley-required-message="El email es requerido" id="email" class="form-control" required placeholder="Ingrese su email"/>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>DUI</label>
                                <input type="text" autocomplete="off" name="dui" data-parsley-required-message="Campo  requerido" id="dui" maxlength="10" minlength="10" class="form-control" required placeholder="Ingrese su dui"/>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" autocomplete="off" name="telefono" data-parsley-required-message="Campo  requerido" id="telefono" class="form-control" required placeholder="Ingrese su telefono"/>
                              </div>
                            </div>

                            <!--div class="col-md-6">
                              <div class="form-group">
                                <label>Fecha nacimiento</label>
                                <input type="date" autocomplete="off" name="fecha1"  data-parsley-required-message="Campo  requerido" id="fecha1" class="form-control" required placeholder="Ingrese su fecha"/>
                              </div>
                            </div-->
                            <div class="col-md-6">
                                <label>Fecha nacimiento bootstrap</label>
                              <div class="input-group error_modificado">

                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" data-parsley-required-message="Campo  requerido" required id="fecha" name="fecha">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label">Tipo persona</label>
                                <select id="tipo_persona" name="tipo_persona" class="form-control select2">
                                     
                                    <option value="1" >Administrador</option>
                                    <option value="2" selected>Empleado</option>
                                </select>               
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Usuario</label>
                                <input maxlength="20" type="text" autocomplete="off" name="usuario" id="usuario"  data-parsley-required-message="Campo  requerido" class="form-control" required placeholder="Ingrese su usuario"/>
                              </div>
                            </div>

                             <div class="col-md-6">
                              <div class="form-group">
                                <label>Contraseña</label>
                                <input maxlength="50" minlength="5" type="password" autocomplete="off" name="contrasenia" data-parsley-required-message="Campo  requerido" id="contrasenia" class="form-control" required placeholder="Ingrese su contraseña"/>
                              </div>
                            </div>



                          </div>
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="boton_enviar"  class="btn btn-primary">Guardar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


<?php include '../../layouts/footerScript.php'; ?>

    <!-- Peity chart JS -->
    <script src="../../public/plugins/peity-chart/jquery.peity.min.js"></script>

    <!--C3 Chart-->
    <script src="../../public/plugins/d3/d3.min.js"></script>
    <script src="../../public/plugins/c3/c3.min.js"></script>

    <!-- KNOB JS -->
    <script src="../../public/plugins/jquery-knob/excanvas.js"></script>
    <script src="../../public/plugins/jquery-knob/jquery.knob.js"></script>

    <!-- Page specific js -->
    <script src="../../public/assets/pages/dashboard.js"></script>

    <!-- Required datatable js -->
    <script src="../../public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../public/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="../../public/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../../public/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../../public/plugins/datatables/jszip.min.js"></script>
    <script src="../../public/plugins/datatables/pdfmake.min.js"></script>
    <script src="../../public/plugins/datatables/vfs_fonts.js"></script>
    <script src="../../public/plugins/datatables/buttons.html5.min.js"></script>
    <script src="../../public/plugins/datatables/buttons.print.min.js"></script>
    <script src="../../public/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="../../public/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../../public/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="../../public/assets/pages/datatables.init.js"></script>
        
    <!-- App js -->
    <script src="../../public/assets/js/app.js"></script>
    <script src="../../public/plugins/select2/js/select2.min.js"></script>

    <script>
        var fecha  = '<?php print date("Y-m-d") ?>';
    </script>

    <script src="funciones_usuarios.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="../../public/plugins/parsleyjs/parsley.min.js"></script>
    <script src="../../public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
</body>
</html>