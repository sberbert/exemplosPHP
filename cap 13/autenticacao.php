<?php

session_start();

// Usuário não fez login?
if (!isset($_SESSION["id"])) {
    header("Location: ../index.php");
    exit();
}