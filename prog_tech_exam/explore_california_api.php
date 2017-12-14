<?php
/*
Dette API udskriver data fra database til JSON format, og gør det tilgængeligt fra et simpelt RESTful URI kald. Det er consumption only, dvs. kun GET / READ er implementeret, 
og understøtter hverken POST, PUT, DELETE (CREATE, UPDATE, DELETE). RESTful APIer gør det hurtigt og nemt at for webservices at kommunikere, i det den gør diverse datastrukturer
tilgængelige uden at man behøver sætte sig ind i den underliggende implementation. Således kan man altså hurtigt og effektivt dele data, så længe det læses i samme format.
F.eks. XML (SOAP) eller JSON (SOAP, REST) osv.
*/


header("Access-Control-Allow-Origin: *");
 
//Get String array with the path requests without delimiter "/"
$path_request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

//db variables
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

// connect to the mysql database and set utf8 charset
$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("utf8");
 
// retrieve table by shifting first array element and replacing special chars
// retrieve key by shifting second array element
$table = preg_replace('/[^a-z0-9_]+/i', '', array_shift($path_request));
$key = array_shift($path_request);
 
// create SQL statement depending on table requested
if($table == tours){
    $sql = "SELECT * from `$table`".($key ? " WHERE tourId = $key" : '');
} elseif($table ==  packages){
    $sql = "SELECT * from `$table`".($key ? " WHERE packageId = $key" : '');
} elseif($table == explorers){
    $sql = "SELECT * from `$table`".($key ? " WHERE explorerId = $key" : '');
}

// excecute SQL statement
$result = $conn->query($sql);
 
// encode resultset to JSON
  if (!$key) echo '[';
  while($row = $result->fetch_assoc()) {
    echo ($count > 0 ? ',' : '') . json_encode($row);
    $count++;
  } 
  if (!$key) echo ']';
 
// close mysql connection
$conn->close();
?>