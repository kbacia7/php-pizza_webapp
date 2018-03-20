<?php 

class QueryBuilder 
{
	public function insert($tableName, $options)
	{
		$connection = DB::getConnection();
		$query = "INSERT INTO `{$tableName}` ("; 
		$last_value = end($options);
		$last_key = key($options);
		foreach(array_keys($options) as $key)
			$query = sprintf("%s`%s`%s", $query, $key, (($last_key == $key) ? (") VALUES (") : (",")));
		foreach($options as $val)
			$query = sprintf("%s'%s'%s", $query, $val, (($last_value == $val) ? (");") : (","))); 
		$this->customQuery($query);  
	}
	
	public function remove($tableName, $row)
	{
		$connection = DB::getConnection();
		$key = key($row);
		$value = end($row);
		$query = "DELETE FROM `{$tableName}` WHERE {$key} = '{$value}'";
		$success = $this->customQuery($query);  
		return ($success->rowCount() > 0) ? true : false;
	}

	public function select($tableName, $select, $whereData = null, $join = null)
	{
		$connection = DB::getConnection();
		$query = "SELECT ";
		$last_key = key($select);
		foreach($select as $colName)
			$query = sprintf("%s%s%s", $query, $colName, (($last_key == $colName) ? ("") : (",")));
		$query = $query . " FROM {$tableName} ";
		if($whereData !== null)
		{
			if(sizeof($whereData) > 1 && ($join === null || trim($join) === ""))
				throw new PizzaException("It looks like something is not working here, you forgot to add a pizza dough (last argument)?");
			$last_value = end($whereData);
			$query = $query . "WHERE ";
			foreach($whereData as $whereCol => $whereValue)
			{
				$query = sprintf("%s%s = '%s' %s", $query, $whereCol, $whereValue, (($last_value == $whereValue) ? ("") : ($join)));
			}
		}
		return $this->customQuery($query);	
	}

	public function update($tableName, $set, $whereData = null, $join = null)
	{
		$connection = DB::getConnection();
		$query = sprintf("UPDATE %s SET ", $tableName);
		end($set);
		$last_key = key($set);
		foreach($set as $colName => $rowValue)
			$query = sprintf("%s%s = '%s'%s", $query, $colName, $rowValue,  (($last_key == $colName) ? (" ") : (",")));
		if($whereData !== null)
		{
			if(sizeof($whereData) > 1 && ($join === null || trim($join) === ""))
				throw new PizzaException("It looks like something is not working here, you forgot to add a pizza dough (last argument)?");
			$last_value = end($whereData);
			$query = $query . "WHERE ";
			foreach($whereData as $whereCol => $whereValue)
			{
				$query = sprintf("%s%s = '%s' %s ", $query, $whereCol, $whereValue, (($last_value == $whereValue) ? ("") : ($join)));
			}
		}
		return $this->customQuery($query);
	}

	public function customQuery($query)
	{
		$connection = DB::getConnection();
		$data =  $connection->prepare($query);
		$data->execute();
		return $data;
	}
}
?>