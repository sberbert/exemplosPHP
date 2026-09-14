<?php
session_start();

// Usuário não fez login?
if (!isset($_SESSION["id"])) {
    //header("Location: ../index.php");
    echo "Você não está logado. 
    Faça seu <a href='../index.php'>Login</a>";
    exit();
}