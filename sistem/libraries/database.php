<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
/**
 * Database
 * 
 * Fungsi untuk memanipulasi database
 * @category Fungsi inti
 */
 
class XP_database 
{
    private $db     = null;
    public $jumlah  = null; 
    private $query  = null;
    private $action = null;
    private $process= false;
    private $cache  = false;
    public $result  = null;
    
    private static $instance;
    
    function __construct()
    {
        self::$instance = & $this;
        $this->konek();
    }
    
    public static function &getinstance()
    {
		return self::$instance;
	}
 
    public function konek()
    {
        $engine         = strtolower( config('db_engine') );
        $server         = config('host');
        $nama_pengguna  = config('db_user'); 
        $sandi          = config('db_pass') ;
        $nama_db        =  config('database'); 
        
        if (!$this->db instanceof PDO){
            if($engine == 'mysql'){
                $this->db = new PDO("$engine:host=$server;dbname=$nama_db", $nama_pengguna, $sandi);
            }
            elseif($engine == 'PostGreSQL'){
                $this->db = new PDO("pgsql:host=$server dbname=$nama_db", $nama_pengguna, $sandi);
            }
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    
  
    function pilih_selektif($pilih = '*',$tabel, $where=null, $order=null,$other =null)
    {
        $sql = "SELECT $pilih FROM $tabel";
        if($where != null)
            $sql.= " WHERE $where";            
        if($order != null) 
            $sql .= " ORDER BY ".$order;   
        if($other != null)  
            $sql.= $other;        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
      
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        $this->jumlah = $stmt->rowCount();
        
        return $data;  
    }
    
    function select( $selected , $cache = false ) {
        $this->query = "SELECT ".$selected.' ';
        $this->process = true;
        if( $cache ) {
            $this->cache = true;
        }
    }
    
    function _update( $table , $field , $value ) {
        $this->query = "UPDATE $table SET $field=$value ";
        $this->process = true;
    }
    
   function _updates($table, $data)
   {
        $sql = "UPDATE $table SET $fieldname='$value' WHERE $where";
        $set = '';
        foreach( $data as $key=>$value ) {
            $set .= $key.'='.$value;
        }
        $stmt = $this->db->prepare($sql);

        $stmt->execute();
    }
    function _delete( $table ) {
        $this->query = " DELETE FROM ".$table.' ';
        $this->process = true;
    }
    
    function from( $from ) {
        if( !$this->process ) {
            return false;
        }
        $this->query.= ' FROM ' .$from. ' ';
    }
    
    function where( $clause ) {
        if( !$this->process ) {
            return false;
        }
        $this->query.= ' WHERE ' .$clause. ' ';
    }
    
    function order( $order , $short ) {
        if( !$this->process ) {
            return false;
        }
        $this->query.= ' ORDER by '. $order. ' '.$short.' ';
    }
    
    function limit( $limit ) {
        if( !$this->process ) {
            return false;
        }
        $this->query.= ' LIMIT '.$limit.' ';
    }
    
    function execute()
    {
        if( !$this->process ) {
            return false;
        }
        
        if( $this->cache ) {
            $xp = getinstance();
            if( $xp->cache->valid( $this->query ) ) {
                $this->result = $xp->cache->get( $this->query );
                return;
            } else {
                $xp->cache->hapus( $this->query );
            }
        }
        try {
            $this->action   = $this->db->prepare( $this->query );
            $this->action->execute();
            $this->process  = false ;    
        } catch (Exception $e) {
            return false;
        } 
        
    }
    
    function fetch() 
    { 
        if( $this->cache ) {
            $xp = getinstance();
            if( $xp->cache->valid( $this->query )) {
                $data = $this->result;
            } else {
                $data = $this->action->fetch( PDO::FETCH_ASSOC );
                $xp->cache->set( $this->query, $data);
            }
        } else {
            $data = $this->action->fetch( PDO::FETCH_ASSOC );
        }
         
        return $data;
    }
    
    function fetchAll()
    {
        if( $this->cache ) {
            $xp = getinstance();
            if( $xp->cache->valid( $this->query )) {
                $data = $this->result;
            } else {
                $data = $this->action->fetchAll( PDO::FETCH_ASSOC );
                $xp->cache->set( $this->query, $data);
            }
        } else {
            $data = $this->action->fetchAll( PDO::FETCH_ASSOC );
        }
         
        return $data;
    }
    
    function count() {
        return $this->action->rowCount();
    }
    
    public function Pilih($tabel, $where=null, $order=null,$other =null)
    {
        $sql = "SELECT * FROM $tabel";
        if($where != null)
            $sql.= " WHERE $where";            
        if($order != null) 
            $sql .= " ORDER BY ".$order;   
        if($other != null)  
            $sql.= $other;        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
      
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        $this->jumlah = $stmt->rowCount();
        
        return $data;  
    }
    
    public function get_one($tabel,$where=null,$other=null)
    {
        $sql = "SELECT * FROM $tabel";
        if($where != null)
            $sql.= " WHERE $where";             
        if($other != null)  
            $sql.= $other;
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->jumlah = $stmt->rowCount();
        
        return $data;
    }
    
    public function rawSelect($sql) {

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->jumlah = $stmt->rowCount();
        
        return $data;
    }

  
    public function rawQuery($sql) {
        $this->db->query($sql);
    }
    

    public function Masukan($table, $values)
    {
       /*** snarg the field names from the first array member ***/
        $fieldnames = array_keys($values[0]);
        /*** now build the query ***/
        $size = sizeof($fieldnames);
     
        $sql = "INSERT INTO $table";
        /*** set the field names ***/
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
        /*** set the placeholders ***/
        $bound = '(:' . implode(', :', $fieldnames) . ' )';
        /*** put the query together ***/
        $sql .= $fields.' VALUES '.$bound;

        /*** prepare and execute ***/
        $stmt = $this->db->prepare($sql);
        foreach($values as $vals){
            $stmt->execute($vals);
        }
    }
    
    public function Insert($table, $values)
    {
        $sql = "INSERT INTO $table";
        $fieldnames = array_keys($values[0]);
        $size = sizeof($fieldnames);
        $i = 1;
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
        $bound = '(:' . implode(', :', $fieldnames) . ' )';
        $value_sql = $fields.' VALUES '.$bound;
        $sql .= $value_sql;
        $stmt = $this->db->prepare($sql);
        foreach($values as $vals){
            $stmt->execute($vals);
        }
    }
    
    function multiple_insert($data = array())
    {
        $num = count($data);
        for($x = 0; $x < $num; $x++){
            $this->Insert($data[$x]['tables'],$data[$x]['values']);
        }
    }
    
    public function Update($table, $fieldname, $value, $where)
    {
        $sql = "UPDATE $table SET $fieldname='$value' WHERE $where";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    public function Set($table, $set, $where)
    {
        $sql = "UPDATE $table SET $set WHERE $where";      
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    public function Updates($table, $data, $where)
    {
        foreach($data as $field=>$val) {
            $this->Update($table, $field, $val, $pk, $id);
        }
    }
   
     public function Delete($table, $fieldname, $id)
     {
        $sql = "DELETE FROM $table WHERE $fieldname = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
     }
     
   
     function __destruct()
     {
        $this->db = null;
     }
}


/* akhir file database */
/* ./sistem/inti/database.php */
