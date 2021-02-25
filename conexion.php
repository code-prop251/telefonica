<?php

    function connect(){
        $con = mysqli_connect('localhost','root','','sgp');
        if($con){
            return $con;
        }else{
            exit();
        }
    }

?>