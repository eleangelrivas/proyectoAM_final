<?php 
    
    include_once("login.php");
    /**
     * summary
     */
    class Conexion
    {
        function obtene_conexion(){
            try {
                $pdo = new PDO(
                    'mysql:dbname='.DATABASE.
                    ';host='.HOST.
                    ';port:3306',
                    USERNAME,
                    PASSWORD,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );
                return $pdo;
            } catch (Exception $e) {
                return $e->getMessage().$e->getLine();  

            }
        }

        function cerrar_sesion($pdo){
            $pdo=null;
        }
    }

    // $instancia = new Conexion();
    // $conectar = $instancia->obtene_conexion();

    // $sql = "SELECT *FROM tb_clientes WHERE dui = ? and telefono=?";
    // $statement = $conectar->prepare($sql);
    // $statement->execute(array('04331249-1','7777-7878'));
    // $datos = $statement->fetchAll();
    // print $statement->rowCount();
    // foreach($datos as $row) {
    //  print "El nombre es: ".$row['nombre'].' '.$row['apellido'];
    //  print '<br>';
    // }
    // print_r($datos);
    /*INSERT*/
    // try {

    //  $sql = "INSERT INTO tb_clientes(dui,nombre,apellido,fecha_nacimiento,telefono)values(?,?,?,?,?)";

    //  $statement = $conectar->prepare($sql);
    //  $statement->execute(array('04331249-8','Rigoberto','Morales',date("Y-m-d"),'7740-7858'));
    // print $statement->rowCount();
    // } catch (Exception $e) {
    //  print $e;
    // }


    

    /*update*/
    // try {

    //  $sql = "UPDATE tb_clientes SET nombre=? where dui = ? ";

    //  $statement = $conectar->prepare($sql);
    //  $statement->execute(array('Nuevo nombre','04331249-8'));
    // print $statement->rowCount();
    // } catch (Exception $e) {
    //  print $e;
    // }


    /*Delete*/
    // try {
    //  $sql = "DELETE FROM tb_clientes where dui = ? ";
    //  $statement = $conectar->prepare($sql);
    //  $statement->execute(array("04331249-6"));
    //  print $statement->rowCount();
    // } catch (Exception $e) {
    //  print $e;
    // }



 ?>