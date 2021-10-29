<?php

class database {
    public $isConn;
    protected $datab;

// DB Connection - Port 3308, User etc.
public function __construct($username = "root", $password = "", 
$host = "127.0.0.1", $dbname = "klaraktiv", $options = []) {

    $this->isConn = TRUE;

    try {
        $this->datab = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port=3308', $username, $password, $options);
        $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
       throw new Exception($e->getMessage());
    }
}

// disconnect from DB

public function disconnect() {
    $this->datab = NULL;
    $this->isConn = FALSE;
}

// get rows
public function getRows($query, $params = []) {

    try {
        $stmt = $this->datab->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();

    } catch(PDOException $e) {

        throw new Exception($e->getMessage());

    }

}

// count rows
public function countRows($query, $params = []){

    try {

        $stmt = $this->datab->prepare($query);
        $stmt->execute($params);
        $countRow = $stmt->rowCount();
        return $countRow;

    } catch(PDOException $e) {

        throw new Exception($e->getMessage());

    }

}

// update - delete - insert Row
public function updateRow($query, $params=[]){
    try{ 
        $stmt = $this->datab->prepare($query); 
        $stmt->execute($params);
        }
        
        catch(PDOException $e){
        throw new Exception($e->getMessage());
    }           
}


}
?>