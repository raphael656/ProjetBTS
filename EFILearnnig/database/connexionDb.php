
<?php


   class Bd{

    private $dsn = 'mysql:host=localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbName = 'mydb';
    private $dbh;
   
    
    private $success = false;
    
    public function __construct(){
        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->password );
            //$this-> dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            
            // echo 'Connection à la BD <br>';
        } catch(PDOException $e) {
            echo "error : " .$e->getMessage();
        }
    
    }
    public function BDqueryAssos($sql, $assos){
        $statement = $this->dbh->prepare($sql);
        $statement->execute($assos);
        $retour = $statement->fetchAll(PDO::FETCH_ASSOC);
        $nmb = $statement->rowCount();
        return array($retour, $nmb);
    }

    public function BDquery($sql){
        $statement = $this->dbh->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_ASSOC);
        $nmb = $statement->rowCount();
        return array($retour, $nmb);
    }


}

?>
