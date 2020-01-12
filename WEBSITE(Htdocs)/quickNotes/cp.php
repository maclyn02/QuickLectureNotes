<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
     <?php
         session_start();
 if(isSet($_SESSION['id']))
 {
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
                                            <li><a href="/index.php" class="active">Home</a></li>
						<li><a href="">About</a></li>
                                                <li><a href=""><?php echo "Hi "; echo $_SESSION['id'];?></a></li>
                                                <li><a href="/quickNotes/logout.php">Logout</a></li>
					</ul>
				</div>
				
<!--				<div id="header">
				</div>-->
				
				<div id="content">
         <h3><b>Control panel</b></h3>
     
   
                   
    	</div>
  <div id="footer">
					<p><a href="">Quick Lecture Notes   </a></p>
				</div>

    </div>
               
               </div>
    </body>
 <?php }
  else{header('location: index.php');};  
  ?>      
    
</html>


