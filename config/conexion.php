<?php
include_once("config.php");
class conexion {
    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function __construct()
    {
        $this->host=HOST;
        $this->dbname=DBNAME;
        $this->user=USER;
        $this->pass=PASS;
    }
    public function getconexion(){
        try {
            $host='mysql:host='.$this->host.';dbname='.$this->dbname.';charset=UTF8';
            $objPDO = new PDO($host, $this->user, $this->pass);
            $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $objPDO; 
        } catch (PDOException $e ) {
            die('ERROR'.$e->getMessage());
        }
    }
}

?>