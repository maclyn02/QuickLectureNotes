<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
$content = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam";
// your page id to display full content
$page_id = 456;
// your page file to display full content
$link = "page.php";
// limit content character
$limit = 100;
// Called readMore() function to convert full content to read more link
echo readMore($content,$link,"id",$page_id, $limit, $limit);
?>

<?php
// Function to create read more link of a content with link to full page
function readMore($content,$link,$var,$id, $limit) {
$content = substr($content,0,$limit);
$content = substr($content,0,strrpos($content,' '));
$content = $content." <a href='$link?$var=$id'>Read More...</a>";
return $content;
}
?>
    </body>
</html>
