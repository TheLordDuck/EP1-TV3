<?php
session_start();
print_r("<p>Variable de sessió : Nom usuari : ".$_SESSION["Nom Usuari"]."</p>");
print_r("Variable de sessió : uid : ".$_SESSION["uid"]);
?>