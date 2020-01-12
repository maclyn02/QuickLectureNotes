<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->




<html xmlns="http://www.w3.org/1999/xhtml">
    
    <link rel="stylesheet" type="text/css" href="style.css" />  
    <head profile="http://www.w3.org/2005/10/profile>
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
                                                <?php    session_start();
                                            
                                                         if(isSet($_SESSION['id']))
                                                         { ?>
                                                <li><a href=""><?php echo "Hi "; echo $_SESSION['id'];?></a></li>
                                               
                                                
                                                 <li><a href="/quickNotes/cp.php">Control Panel</a></li> 
                                                <li><a href="/quickNotes/logout.php">Logout</a></li>
                                                     
                                                
                                                        
                                               
                                            
                                                         
                                                         
                                                         <?php }    else{?>
                                                
                                                <li><a href="/quickNotes/login.php">Login</a>
                                                <li><a href="/quickNotes/register.php">Register</a>
                                                        
                                                        <?php }?>
					</ul>
                                    
				</div>
				
<!--				<div id="header">
				</div>-->
				
				<div id="content">
        <h1>Search Notes</h1>  
        <form action="/quickNotes/next.php" method="get">
        <table>
            <tr> <td>SEMESTER </td><td><select OnChange="change_sem();" name ="sem" id="sem">
<?php
include('dbconn.php');
$r=mysql_query("select DISTINCT sem from data",$conn);
while($row=mysql_fetch_array($r)) 
{
	?>
	<option><?php echo $row['sem']?></option>
<?php	
}
?>
        
</select></td>
        </form>
        <tr> <td>SUBJECT </td><td>
                <select  name ="sub" id="sub">
                    <option>Select subject </option>

                            

</select>           
  	<script src="script.js"></script>
        <script>

function change_sem()
{

    var sem = $("#sem").val();

    // window.alert(5 + 6);
    
       $.ajax({

        type: "POST",

        url: "/quickNotes/ajax.php",

        data: "sem="+sem,
        cache: false,

        success: function(response)

            {//document.getElementById('p').innerHTML="start";
                 //   alert(response);return false;
                $("#sub").html(response);

            }

            });

     

}

</script>

                    
<td><input  type="submit" value="Next" name="sub2"></td></tr>
</td>
                    
 
        </table>
            
    	</div>
    </div>
            <div id="footer">
					<p><a href="">Quick Lecture Notes   </a></p>
				</div>
            </div>
    </body>
</html>

