<?php

//error_reporting(E_NOTICE || E_WARNING);
class Connection {
    protected $hostname = "localhost";
    protected $username = "root";
    protected $password = "";      
    protected $database = "kopkar";

    public function __construct() {
        $connectdb = mysql_connect($this->hostname, $this->username,$this->password);
        if($connectdb) {
            $selectdb  = mysql_select_db($this->database);
            if(!$selectdb) {
                header("Location: error/error_select_db.php");
            }
        }
        else {
            header("Location: error/error_connect.php");
        }
    }
}

class CrudKopkar {
    
    /*
     *  © IBeESNay
     *  mysql_query
     *  Penggunaan fungsi
     * 
     *  $sampel = $ARSql->query($query)
     * 
     */
    public function query($query) {
        $data = mysql_query($query) or die (mysql_error());
        return $data;
    }
    
    /*
     *  © IBeESNay
     *  getAll
     *  Show all record
     *  Penggunaan fungsi
     * 
     *  $sampel_1 = $ARSql->getAll('nama_tabel');
     *  $sampel_2 = $ARSql->getAll('nama_tabel', 'id','DESC');
     * 
     */
    public function getAll($tabel, $kolom = null, $set_by = null) {
        if(!empty($kolom) && !empty($set_by)) {
            $data = $this->query("SELECT * FROM $tabel ORDER BY $kolom ".$set_by."");
        }
        else {
            $data = $this->query("SELECT * FROM $tabel");
        }
        
        return $data;
    }
    
    /*
     *  © IBeESNay
     *  getOne
     *  Get One Record
     *  Penggunaan fungsi
     * 
     *  $sampel = $ARSql->getOne('nama_tabel', 'field','value');
     * 
     */
    public function getOne($tabel, $kolom, $value) {
        $query = $this->query("SELECT * FROM $tabel WHERE $kolom='$value'");
        $data  = $this->mfObject($query);
        return $data;
    }

    // public function getWhereAll($tabel, $kolom, $value) {
    //     //$print = array();

    //     $query = $this->query("SELECT * FROM $tabel WHERE $kolom='$value'");
    //     $data  = $this->mfArray($query);

    //     while ($data) {
    //         $print[] = $data;
    //     }
    //     return $print;
    // }
    
    /*
     *  © IBeESNay
     *  delOne
     *  Delete One Record
     *  Penggunaan fungsi
     * 
     *  $sampel = $ARSql->delOne('nama_tabel', 'field','value');
     * 
     */
    public function delOne($tabel,$kolom, $value) {
        $data = $this->query("DELETE FROM $tabel WHERE $kolom='$value'");
        
        return $data;
    }
    
    /*
     *  © IBeESNay
     *  insert
     *  Insert data to table
     *  Penggunaan fungsi
     *  
     *  $data = array(
     *          'field_1' => $value_1,
     *          'field_2' => $value_2,
     *          'field_3' => $value_3
     *          );
     *  $sampel = $ARSql->insert('nama_tabel', $data);
     * 
     */
    public function insert($tabel, array $data) {
        $sql = "INSERT INTO ".$tabel." SET";
        foreach ($data as $field => $value) {
            $sql .= " ".$field."='".mysql_real_escape_string($value)."',";
        }
        
        $sql = rtrim($sql, ',');
        return $this->query($sql);
    }
    
    /*
     *  Implements by public function update
     * 
     */
    public function updateData($tabel, array $data, $where=null) {
        $sql = "UPDATE $tabel SET";
        foreach ($data as $field => $value) {
            $sql .= " ".$field."='".mysql_real_escape_string($value)."',";
        }
        
        $sql = rtrim($sql, ',');
        if($where) {
            $sql .= " WHERE ".$where;
        }
        
        return $this->query($sql);
    }
    
    /*
     *  © IBeESNay
     *  update
     *  Update record on table
     *  Penggunaan fungsi
     *  
     *  $data = array(
     *          'field_1' => $value_1,
     *          'field_2' => $value_2,
     *          'field_3' => $value_3
     *          );
     *  $sampel = $ARSql->update('nama_tabel', 'field','value', $data);
     * 
     */
    public function update($tabel, $kolom, $value, array $data){
        $where = "".$kolom."='".mysql_real_escape_string($value)."'";
        return $this->updateData($tabel, $data, $where);
    }


    public function addLog($id_user,$aktifitas) {
        $tanggal    = date("Y-m-d");
        $waktu      = date("H:i:s");
        $query_log  = "INSERT INTO log_user VALUES('','$id_user','$aktifitas','$tanggal','$waktu')";
        return $this->query($query_log);

    }


    /*
     *  © IBeESNay
     *  mysql_num_rows
     *  Count total record
     *  Penggunaan fungsi
     *  
     *  $sampel = $ARSql->numRows($query);
     * 
     */
    public function numRows($param) {
        return mysql_num_rows($param);
    }
    
    /*
     *  © IBeESNay
     *  mysql_fetch_array
     *  Count total record
     *  Penggunaan fungsi
     *  
     *  $sampel = $ARSql->mf_array($query);
     * 
     */
    public function mfArray($param) {
        return mysql_fetch_array($param);
    }
    
    /*
     *  © IBeESNay
     *  mysql_fetch_object
     *  Count total record
     *  Penggunaan fungsi
     *  
     *  $sampel = $ARSql->mf_object($query);
     * 
     */
    public function mfObject($param) {
        return mysql_fetch_object($param);
    }
    
/*
 * End of class Active_record
 */
}
?>