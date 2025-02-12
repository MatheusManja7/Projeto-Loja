<?php 

class Database{
    private $conn;
    private string $local='localhost';
    private string $db = 'db_Loja'; 
    private string $user = 'root'; 
    private string $password = '';
    private string $table;

    function __construct($tabela = null)
    {
        $this->table = $tabela;
        $this->conecta();
    }

    private function conecta()
    {
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=".$this->db, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $err) {
            die("Connection Failed: " . $err->getMessage());
        }
        
    }

    public function execute($query, $binds = [])
    {
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }
        catch (PDOExeption $err){
            die("Connection Failed" .$err->getMessage());
        }
    }

    public function insert($values)
    {
        $fields = array_keys($values);

        $binds = array_pad([],count($fields),'?');

        $query = 'INSERT INTO ' .$this->table. '('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $res = $this->execute($query, array_values($values));

        if($res)
        {
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table .' '.$where.' '.$order. ' '.$limit;

        return $this->execute($query);
    }

    public function update($where, $array)
    {
        $fields = array_keys($array);
        $param = array_values($array);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?, ',$fields).'=? WHERE '.$where;

        $res = $this->execute($query,$param);
        if($res){
            return true;
        }
    }

    public function delete($where)
    {
        $query = 'DELETE FROM ' .$this->table.' WHERE '.$where;
        $res = $this->execute($query);

        return $res->rowCount() > 0;
    }
}


?>