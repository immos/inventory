<?php 

        $connect = mysqli_connect("localhost", "root", "", "inventory_management");
        ob_start();


        function secure($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        



?>