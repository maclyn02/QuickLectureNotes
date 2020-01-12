<?php

include('dbconn.php');

$class = $_POST['sem'];
$sql= "select distinct subject from notes where class='$class'";
$query = mysql_query($sql,$conn);

echo '<option>Select Subject</option>';

while($res=mysql_fetch_array($query)){

echo '<option >'.$res['subject'].'</option>';
     
}

?>
