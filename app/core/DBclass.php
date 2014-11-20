<?php 

namespace app\core;

use PDO;

class DBClass   {

	public $pdo;
	private $hostname = 'localhost';
	private $dbname = 'todo';
	private $username = 'root';
	private $password = '';


	public function __construct()
	{
		$opt = array( PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
		$this->pdo = new PDO('mysql:host=' .$this->hostname. ';	dbname=' .$this->dbname. '; charset=utf8', 	$this->username, $this->password, $opt);

	}
	
	/**
	 * Return a full result set from the database table based on the model being called
	 * @return object result set
	 */
	public function getAll()
	{
		return  $this->pdo->query("SELECT * FROM $this->table");
	}

	public function findOne($id)
	{
		// extract($data);
		$sql = ("SELECT * FROM $this->table WHERE id = :id");
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$this->stmt->execute();
		$result = $this->stmt->fetch(PDO::FETCH_OBJ);
		// varDump($task);
		return $result;
	}

	public function where($field, $operator, $value)
	{
		$sql = "SELECT * FROM {$this->table}  WHERE {$field} {$operator} :value";
		$this->stmt = $this->pdo->prepare($sql);
		$this->stmt->bindParam(':value', $value);
		$this->stmt->execute();

		$results = $this->stmt->fetchAll();
		return $results;
	}

	public function count()
	{

	}

	public function store(array $data)
	{

		// retrieve the keys of the array (column titles)
		$fields = array_keys($data);

		// build the query
		$sql = 'insert into ' .$this->table. '(' .implode(',', $fields).')';
		 $sql .= "values ( '" .implode("','", $data). "')";
		$query = $this->pdo->prepare($sql);
		$query->execute();

		return $this->pdo->lastInsertId();
	}

	public function update($data, $where = null)
	{
		    // check for optional where clause
		    $whereSQL = '';
		    if(!empty($where))
		    {
		        // check to see if the 'where' keyword exists
		        if(substr(strtoupper(trim($where)), 0, 5) != 'WHERE')
		        {
		            // not found, add key word
		            $whereSQL = " WHERE ".$where;
		        } else
		        {
		            $whereSQL = " ".trim($where);
		        }
		    }
		    // start the actual SQL statement
		    $sql = "UPDATE ".$this->table." SET ";

		    // loop and build the column /
		    $sets = array();
		    foreach($data as $column => $value)
		    {
		         $sets[] = "`".$column."` = '".$value."'";
		    }
		    $sql .= implode(', ', $sets);

		    // append the where statement
		    $sql .= $whereSQL;

		   
		    // run and return the query result
		    $query = $this->pdo->prepare($sql);
		    $query->execute();

		    if ($query)
		    {
		    	return true;
		    }
		    return false;
	}

	public function check($email, $password)
	{
		$password = hash('sha256', $password);
		$stmt = "select * from $this->table where email = :email and password = :password";
		$data = $this->pdo->prepare($stmt);
		$data->bindParam(':email', $email);
		$data->bindParam(':password', $password);
		$data->execute();

		$user = $data->fetch(PDO::FETCH_OBJ);

		$count = $data->rowCount();
		if($count === 1)
		{
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['id'] = $user->id;
			$_SESSION['username'] = $user->username;
			
			return $user;
		}
		return false;
	}

	public function delete($id)
	{
		$stmt = "delete from $this->table where id = :id";
		$query = $this->pdo->prepare($stmt);
		$query->bindParam(':id', $id);
		
		$query->execute();
		
		if ($query)
		{
			return true;
		}
		return false;
	}

}


