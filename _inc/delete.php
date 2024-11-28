<?php
include 'config.php';

if ($_GET['id']) {
    $id = isset($_GET['id']) ? realEscapeString($_GET['id']) : '';
    $result = query("DELETE FROM user WHERE id = '$id'");

    addMessage('ok', 'Uživatel úspěšně smazán');

    redirect();
}

    
     