<?php 
    
    define("DATABASE", "ejemplo1");
    define("HOSTNAME", "localhost");
    define("USERNAME", "ele1990");
    define("PASSWORD", "Root1234.");
    /**
     * summary
     */
    class Conexion
    {
        /**
         * summary
         */
        public function __construct()
        {
            
        }

        public function get_conexion(){

            try {
                $pdo = new PDO(
                    'mysql:dbname=' .DATABASE .
                    ';host=' . HOSTNAME .
                    ';port:3306;',
                    USERNAME,
                    PASSWORD,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );

                return $pdo;
            } catch (Exception $e) {
                    print "fatal error al conectarse";
            }

        }
    }


 ?>