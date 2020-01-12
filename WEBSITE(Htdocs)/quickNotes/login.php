<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    
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
        
       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table align="center">

<tr><td>ID:</td>  		<td>	<input class="text1"  type="text" name="id"  required><br></td></tr>
<tr><td>PASSWORD:</td> <td><input class="text1" type="PASSWORD" name="pass" required><br></td></tr>
<tr><td></td><td><input class="btn1" type="submit" value="LOGIN" name="sub"></td></tr>
</table>

</form>
<?php
if(IsSet($_POST['sub']))
{

$a=$_POST['id'];
$b=$_POST['pass'];

if($a == "" || $b == "" )
{	
	echo '<script language="javascript">';
	echo 'alert("Enter ID/password")';
	echo '</script>';
}
else
{
include('dbconn.php');
$r=mysql_query("select id,pass from users where id='$a' && pass='$b'",$conn);
$flag=0;
while($row=mysql_fetch_array($r))
{
	$flag=1;
	break;
}

if($flag==1)
{
session_start();
$_SESSION['id']= $a;
	header("location: index.php");
}
else
{
	echo '<script language="javascript">';
	echo 'alert("ID/password do not match")';
	echo '</script>';
}
}
}



?>
                  
    	</div>
  <div id="footer">
					<p><a href="">Quick Lecture Notes   </a></p>
				</div>
    </div>
    </body>
</html>
