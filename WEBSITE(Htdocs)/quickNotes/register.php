<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
   <?php
if(isset($_POST["name2check"]) && $_POST["name2check"] != ""){
   include('dbconn.php');
    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['name2check']); 
    $sql_uname_check = mysql_query("SELECT id FROM users WHERE id='$username' LIMIT 1"); 
    $uname_check = mysql_num_rows($sql_uname_check);
    if (strlen($username) < 4) {
	    echo '<font style="color:red">4 - 15 characters please</font>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<font style="color:red">First character must be a letter</font>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong > <font style="color:green">' . $username . '</strong> is OK</font>';
	    exit();
    } else {
	    echo '<strong> <font style="color:red">' . $username . '</strong> is taken </font>';
	    exit();
    }
}
?>
    
    
       <link rel="stylesheet" type="text/css" href="style.css" />  
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
             <div id="page">
            <div id="title">
                <h1>QUICK LECTURE NOTES </h1>
            </div>
            
            <div id="body">
				<div id="nav">
					<ul>
						<li><a href="" class="active">Home</a></li>
						<li><a href="">About</a></li>
						
					</ul>
				</div>
				
<!--				<div id="header">
				</div>-->
				
				<div id="content">
        
    <h1 align=center>REGISTER NEW ACCOUNT</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table align="center">
<tr>
	<td>USER ID :</td><td><input  type="text" name="uname" id="uname" onBlur="checkusername()" maxlength="15" required>&nbsp<span id="usernamestatus"></span></td>
</tr>

<tr>
	<td>FULL NAME :</td><td><input  type="text" name="fname" required> </td>
</tr>
<tr>
	<td>EMAIL :</td><td><input  type="email" name="email" 1 required></td>
</tr>
<tr>
	<td>Role :</td><td><input type="radio" name="role" value="Student"> Student
            <input type="radio" name="role" value="Faculty" required> Faculty</td>
</tr>
<tr>
	<td>
PASSWORD:</td> <td><input  type="PASSWORD" name="pass" id="pass1" required><br></td>
</tr>
<tr>
	<td>
CONFIRM PASSWORD: </td><td><input  type="PASSWORD" name="pass2" id="pass2"  onkeyup="checkPass(); return false;> <span id="confirmMessage" class="confirmMessage" required></span><br></td></tr> 

		<td></td>
		<td>
			<input  type="submit" value="REGISTER" name="sub">
		</td>
	</tr>

</table>
</form>

<?php
if(IsSet($_POST['sub']))
{

$id=mysql_real_escape_string($_POST['uname']);
$name=mysql_real_escape_string($_POST['fname']);
$d=mysql_real_escape_string($_POST['pass']);
$e=mysql_real_escape_string($_POST['pass2']);
$f=mysql_real_escape_string($_POST['email']);
$role=mysql_real_escape_string($_POST['role']);
//echo $id ,$name , $d ,$e,$f,$role;

if($e==$d)
{
include('dbconn.php');
$sql ="insert into users values('$id','$name','$d','$role','$f')";
//echo $sql;
$r=mysql_query($sql,$conn);
echo '<script language="javascript">';
	echo 'alert("You are Registered")';
	echo '</script>';
	header("location: login.php");
}
else
{
	echo '<script language="javascript">';
	echo 'alert("Passwords Do not match")';
	echo '</script>';
}
}




?>

    	</div>
    </div>
                       <div id="footer">
					<p><a href="">Quick Lecture Notes   </a></p>
				</div>
                   </div>
   
    </body>
    
    <script>
function checkusername(){
	var status = document.getElementById("usernamestatus");
	var u = document.getElementById("id").value;
	if(u != ""){
		status.innerHTML = 'checking...';
		var hr = new XMLHttpRequest();
		hr.open("POST", "/quickNotes/register.php", true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				status.innerHTML = hr.responseText;
			}
		}
        var v = "name2check="+u;
        hr.send(v);
	}
}
</script>
</html>
