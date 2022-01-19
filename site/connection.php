<?php
/*conexiunea cu baza de date*/ 
$connect_error = "Eroare";
$conn=oci_connect("bdp","bdp","localhost/XE") or die($connect_error);
?>