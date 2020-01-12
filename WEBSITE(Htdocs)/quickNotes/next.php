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
					</ul>
				</div>
				
				
				<div id="content">
 <?php 

function readMoreFunction($story_desc,$link,$targetFile,$id) {  
$chars = 45;  
$story_desc = substr($story_desc,0,$chars);  
$story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
$story_desc = $story_desc." <a class='btn' href='$link?$targetFile=$id'>Read More...</a>";  
return $story_desc;  
}  

        
       include('dbconn.php');
$sem=$_GET['sem'];
$sub=$_GET['sub'];


$r=mysql_query("select * from notes where class='$sem' && subject='$sub'",$conn);

?>
        <h3><b>SUBJECT: <?php echo $sub; ?></b></h3>
        <table border="1" align="center">
            
            <tr><th>DATE</th> <th>TEXT LECTURE</th><th>VOICE LECTURE</th></tr> 
    
    <?php
while($row=mysql_fetch_array($r)) 
{
	$id=$row['id'];
	$date=$row['date'];
	$content=$row['hand_text'];
	$content1=$row['spoken_text'];
       ?> <tr><td> <?php echo $date;?></td><td><?php echo readMoreFunction($content,"read.php","id",$id); ;?></td><td><?php echo readMoreFunction($content1,"read1.php","id",$id); ;?></td></tr><?php
}
      
?>
        </table>
   
                   
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


