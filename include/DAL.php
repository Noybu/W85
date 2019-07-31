<?php

// Open connection: 
function connect() {
    $connection = mysqli_connect("localhost", "noybu_urban", "Urban123", "noybu_urban");
    $connection->set_charset('utf8');
    return $connection;
}

// Insert: 
function insert($sql) {
    $connection = connect();
   
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

// Update: 
function update($sql) {
    $connection = connect();
    mysqli_query($connection, $sql);
    
    
    mysqli_close($connection);
}

// Delete: 
function delete($sql) {
    $connection = connect();
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

// Select: 
function select($sql) {
    $connection = connect();
    $table = mysqli_query($connection, $sql);
    $obj = mysqli_fetch_object($table);
    while($obj != null) {
        $arr[] = $obj;
        $obj = mysqli_fetch_object($table);
    }
    mysqli_close($connection);
    return $arr;
}


// Get object:
function get_object($sql) {
	$connection = connect();
	
	$result = mysqli_query($connection, $sql);
	$obj = mysqli_fetch_object($result);
	
	mysqli_close($connection);
	
	return $obj;
}

// Get array: 
function get_array($sql) {
	$connection = connect();
	
	$arr = array();
	
	$result = mysqli_query($connection, $sql);
	while($obj = mysqli_fetch_object($result)) {
		$arr[] = $obj;
	}
	
	mysqli_close($connection);
	
	return $arr;
}
