<?php
    session_start();
    session_destroy();
    header ("Location:indexcli.php");
?>