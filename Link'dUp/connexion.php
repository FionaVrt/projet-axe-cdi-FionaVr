<?php
    try{
        $database = new PDO('mysql:host=localhost;dbname=linkdup', 'root','root');
    } catch (Exception $e){
        die('Error :'. $e->getMessage());
    } 
?>