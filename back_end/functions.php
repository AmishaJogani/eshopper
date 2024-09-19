<?php

include "db.php";
function getData($fields, $table, $where = "1=1", $limit = "10")
{
    global $conn;
    $sql = "SELECT $fields FROM $table WHERE $where LIMIT $limit";

    $result = $conn->query($sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
      }

    return $data;
}

function getSingleData($fields, $table, $where = "1=1")
{
    global $conn;
    $sql = "SELECT $fields FROM $table WHERE $where";

    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    return $data;
} 

function deleteData($table, $where){

}

function updateData($table, $where, $data){
    global $conn;
  
    $strings = [];
    foreach($data as $key => $value){
        $strings[] =  "$key = \"$value\" ";
    }
    $setString =  implode(",", $strings);
    
    $sql = "UPDATE $table SET $setString where $where";

    return $conn->query($sql);

}


?>