<?php
include("../includes/constants.php");

if (isset($_GET['i']))
{
   $id  = $_GET['i'];
} 
if (isset($_GET['s']))
{
   $star  = $_GET['s'];
} else {
   $star = "";
}
header('Content-type: application/json');
$mysqli = new mysqli($dbserver, $username, $dbpwd, $database);
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if ($star == "1") {
  $starqry = "UPDATE items SET starred = 1 WHERE id = " . $id;
  if(mysqli_query($mysqli, $starqry)){
      $response_array['status'] = 'success';  
  }else {
      $response_array['status'] = 'error';  
  }
} elseif ($star == "0") {
  $starqry = "UPDATE items SET starred = 0 WHERE id = " . $id;
  if(mysqli_query($mysqli, $starqry)){
      $response_array['status'] = 'success';  
  }else {
      $response_array['status'] = 'error';  
  }
} else {
  $getTitle = "SELECT title FROM items WHERE id = " . $id;
  $result = mysqli_query($mysqli, $getTitle);
  while($row = mysqli_fetch_assoc($result)){
     $title[] = $row;
  }
  // Replace '
  $stitle = str_replace("'", "''", $title[0]['title']);
  $query = "UPDATE items SET unread = 0 WHERE title = '" . $stitle . "'";
  if(mysqli_query($mysqli, $query)){
      $response_array['status'] = 'success';  
  }else {
      $response_array['status'] = 'error';  
  }
}
echo json_encode($response_array);
$mysqli -> close();
?>