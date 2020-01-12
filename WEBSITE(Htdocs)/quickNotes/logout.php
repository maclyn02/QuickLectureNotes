<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <meta http-equiv="refresh" content="3;url=/quickNotes/index.php"/>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    			<?php
			session_start();
			@	$id=$_SESSION['id'];
			session_destroy();
			?>
			<h1 align="center"><a>You have Successfully Logged Out , Redirecting in 3 seconds </a></h1><br>
<h1 align="center"><a> </a> </h1>
    </body>
</html>
