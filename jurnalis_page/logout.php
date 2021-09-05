<?php
session_start();
unset ($_SESSION['id_jurnalis']);
session_destroy();
header('Location: ../jrn/');
?>
