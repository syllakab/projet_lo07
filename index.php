<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: app/router/routerSoutenance.php?action=acceuil');

?>