<?php
    // Verifica se o usuário tem perfil de Administrador
    if ($_SESSION["perfil"] != "ADM") {
        die("🛑 Acesso negado.");
    }