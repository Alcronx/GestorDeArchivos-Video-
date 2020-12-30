<?php
    session_start();

        if(isset($_SESSION['usuario'])){
            include "header.php"
        
?>

<?php
 include "footer.php";
    }else{
        header("location:../index.php");
    }
?>