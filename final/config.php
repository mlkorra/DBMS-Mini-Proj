<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'Chinnu2712');
   define('DB_DATABASE', 'project');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($db == NULL)die("Connection to database failed");
?>