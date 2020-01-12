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
    
    <script>
function myFunction() {
    window.print();
}
</script>
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
                                                <li><a href=""><?php echo "Hi "; echo $_SESSION['id'];?></a></li>
						
					</ul>
				</div>
				
<!--				<div id="header">
				</div>-->
				
				<div id="content">
        
        <?php
             $id= $_SERVER['QUERY_STRING']    ;
             $id = substr($id, strpos($id, "=") + 1);    
             
           //  echo $id;  
             include('dbconn.php');
             $r=mysql_query("select * from notes where id='$id'",$conn);
             while($row=mysql_fetch_array($r)) {
                $date=$row['date'];
 $vsource=$row['voice_location'];               $content=$row['spoken_text'];
                $sub =$row['subject'];
                $sem = $row['class'];
                ?>
                                    <h7><b>SUBJECT: <?php echo $sub; ?>   <br>      SEMESTER: <?php echo $sem; ?>    <br>      DATE: <?php echo $date; ?> </b></h7>
        
        <p><?php echo $content; ?> </p>
               
                
                <?php
                
             }
        ?>
		<b>Play Audio:</b><br>
		
        <audio controls>
			<source src=<?php echo ".\\audio\\".$vsource;?> type="audio/mp3">
			Content not supported
		</audio>
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
