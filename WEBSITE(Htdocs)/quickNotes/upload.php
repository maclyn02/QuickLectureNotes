<?php

$dir="D:\\Project\\uploaded_img\\";
$name="";
$full_name=glob($dir."*.jpg");
foreach($full_name as $f)
{
  $name=$f;
}
$name=substr($name,strripos($name,"\\")+1);
$tok="";

$tok=strtok($name,"_");
if($tok!=false)
{
   $d1=$tok;
   $tok=strtok("_");
}
if($tok!=false)
{
   $d2=$tok;
   $tok=strtok("_");
}
if($tok!=false)
{
   $d3=$tok;
   $tok=strtok("_");
}
$date=$d1."/".$d2."/".$d3;



if($tok!=false)
{
   $t1=$tok;
   $tok=strtok("_");
}
if($tok!=false)
{
   $t2=$tok;
   $tok=strtok("_");
}
$time=$t1.":".$t2;


if($tok!=false)
{
   $class=$tok;
   $tok=strtok(".");
}


if($tok!=false)
{
   $sub=$tok;
}


$dir="D:\\Project\\";
$hand="";
$hand_name=glob($dir."*.txt");
foreach($hand_name as $f)
{
  $hand=$f;
}
$hand=file_get_contents($hand);



$dir="D:\\Project\\Audio\\";
$sp="";
$sp_name=glob($dir."*.txt");
foreach($sp_name as $f)
{
  $sp=$f;
}
$sp=file_get_contents($sp);

$name=$d1."_".$d2."_".$d3."_".$t1."_".$t2."_".$class."_".$sub.".mp3";

include ('dbconn.php');
mysql_query("insert into notes(date,time,subject,class,hand_text,spoken_text,voice_location) values ('$date','$time','$sub','$class','$hand','$sp','$name')",$conn);
?>