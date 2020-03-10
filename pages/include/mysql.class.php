<?php
require_once 'config.php';
class Database {
    protected $_mysqli;
    protected $_query;
    protected $_db;
    
    public function __construct() {
        $config = new Config();
        $this->_db = $config->_db;
        
        // Create connection
        $this->_mysqli = new mysqli($config->_host, $config->_username, $config->_password);

        // Check connection
        if ($this->_mysqli->connect_error) {
            die("Connection failed: " . $this->_mysqli->connect_error);
        }
    }
    public function __destruct() {
        if ($this->_mysqli) {
            $this->_mysqli->close();
            $this->_mysqli = null;
        }
    }
    public function connection(){
        return $this->_mysqli;
    }
    public function get_all_data($tableName, $data = null, $sort = null, $limit = null, $count = null){
        return $this->_buildSelect($tableName, $data, $sort, "SELECT", $limit, $count);
    }
    public function insert($tableName, $insertData = null){
        return $this->_buildInsert($tableName, $insertData, 'INSERT');
    }
    public function update($tableName, $updateData, $id){
        return $this->_buildUpdate($tableName, $updateData, $id, "UPDATE");
    }
    public function delete($tableName, $deleteID){
        return $this->_buildDelete($tableName, $deleteID, "DELETE");
    }
    protected function _buildSelect($tableName, $data, $sort, $operation, $limit, $count){
        $sql = $operation." * FROM ".$this->_db.".".$tableName;
        if($data){
             $sql .= " WHERE ". $data;
        }
        if($sort){
            $sql .= " ORDER BY ". $sort;
        }
        if($limit){
            $sql .= " LIMIT 0, ". $limit;
        }  
        $result = $this->_mysqli->query($sql);
        return $result;
    }
    protected function _buildInsert($tableName, $insertData, $operation){
        $fields = $values = $exclude= array();
        $exclude = "submit";
        if( !is_array($exclude) ) $exclude = array($exclude);
        foreach( array_keys($insertData) as $key ) {
            if( !in_array($key, $exclude) ) {
                $fields[] = "`$key`";
                $values[] = "'" . $this->_mysqli->real_escape_string($insertData[$key]) . "'";
            }
        }
        $fields = implode(",", $fields);
        $values = implode(",", $values);
        $sql = $operation." INTO ".$this->_db.".".$tableName." (".$fields.") VALUES (".$values.")";
        if ($this->_mysqli->query($sql) === TRUE) {
            return array("Data added successfully!", "success");
        } else {
            return array($this->_mysqli->error, "danger");
        }
    }
    protected function _buildUpdate($tableName, $updateData, $id, $operation){
        $fields = $values = $exclude= array();
        $exclude = "submit";
        if( !is_array($exclude) ) $exclude = array($exclude);
        foreach ($updateData as $key => $value) {
            if( !in_array($key, $exclude) ) {
                $value = $this->_mysqli->real_escape_string($value); // this is dedicated to @Jon
                $value = "'$value'";
                $data[] = "$key = $value";
            }
        }
        $updateData = implode(', ', $data);
        $sql = $operation." ".$this->_db.".".$tableName." SET ".$updateData." WHERE id = ". $id;
        if ($this->_mysqli->query($sql) === TRUE) {
            return array("Data edited successfully!", "success");
        } else {
            return array($this->_mysqli->error, "danger");
        }
    }
    protected function _buildDelete($tableName, $deleteID, $operation){
        $sql = $operation. " FROM ".$this->_db.".".$tableName." WHERE id = ". $deleteID;
        if ($this->_mysqli->query($sql) === TRUE) {
            return array("Data deleted successfully!", "success");
        } else {
            return array($this->_mysqli->error, "danger");
        }
    }
}
?>