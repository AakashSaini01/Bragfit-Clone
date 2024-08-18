<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "bragfit_database";

   // Create connection
   $con = new mysqli($servername, $username, $password,$database);
   session_start();
?>