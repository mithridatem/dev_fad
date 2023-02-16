<?php
    session_start();
    /* Deconnexion */
    session_destroy();
    /* Redirection */
    header('Location: ../');
?>