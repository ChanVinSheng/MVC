<!-- Author: Chan Vin Sheng, Low Wei Yin, Low Ee Hui, Leek Hon Lun -->

<?php
class database extends PDO
{
    
    protected static $instances = array();
    
    public static function get()
    {
        $type = 'mysql';
        $host = 'localhost';
        $name = 'ipassignment';
        $user = "root";
        $pass = "";
        // ID for database based on the group information
        $id = "$type.$host.$name.$user.$pass";
        // Checking if the same
        if (isset(self::$instances[$id])) {
            return self::$instances[$id];
        }
        $instance = new Database("$type:host=$host;dbname=$name;charset=utf8", $user, $pass);
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Setting Database into $instances to avoid duplication
        self::$instances[$id] = $instance;
        //return the pdo instance
        return $instance;
    }
    /**
     * run raw sql queries
     * @param  string $sql sql command
     * @return none
     */
    public function raw($sql)
    {
        $this->query($sql);
    }
   
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ, $class = '', $single = null)
    {
        
        if (strtolower(substr($sql, 0, 7)) !== 'select ') {
            $sql = "SELECT " . $sql;
        }
        $stmt = $this->prepare($sql);
        foreach ($array as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue("$key", $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue("$key", $value);
            }
        }
        $stmt->execute();
        if ($single == null) {
            return $fetchMode === PDO::FETCH_CLASS ? $stmt->fetchAll($fetchMode, $class) : $stmt->fetchAll($fetchMode);
        } else {
            return $fetchMode === PDO::FETCH_CLASS ? $stmt->fetch($fetchMode, $class) : $stmt->fetch($fetchMode);
        }
    }
   
    public function find($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ, $class = '')
    {
        return $this->select($sql, $array, $fetchMode, $class, true);
    }
   
    
    public function count( $column , $table )
    {
        $stmt = $this->prepare("SELECT $column FROM $table");
        $stmt->execute();
        return $stmt->rowCount();
    }
    
    public function insert($table, $data)
    {
        ksort($data);
        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':'.implode(', :', array_keys($data));
        $stmt = $this->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->lastInsertId();
    }
   
    public function update($table, $data, $where)
    {
        ksort($data);
        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key = :$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $whereDetails = null;
        $i = 0;
        foreach ($where as $key => $value) {
            if ($i == 0) {
                $whereDetails .= "$key = :$key";
            } else {
                $whereDetails .= " AND $key = :$key";
            }
            $i++;
        }
        $whereDetails = ltrim($whereDetails, ' AND ');
        $stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }
   
    public function delete($table, $where, $limit = 1)
    {
        ksort($where);
        $whereDetails = null;
        $i = 0;
        foreach ($where as $key => $value) {
            if ($i == 0) {
                $whereDetails .= "$key = :$key";
            } else {
                $whereDetails .= " AND $key = :$key";
            }
            $i++;
        }
        $whereDetails = ltrim($whereDetails, ' AND ');
        //if limit is a number use a limit on the query
        if (is_numeric($limit)) {
            $uselimit = "LIMIT $limit";
        }
        $stmt = $this->prepare("DELETE FROM $table WHERE $whereDetails $uselimit");
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }
   
    public function truncate($table)
    {
        return $this->exec("TRUNCATE TABLE $table");
    }
}
