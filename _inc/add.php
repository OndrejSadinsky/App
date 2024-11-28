<?php

include 'config.php';

if (isset($_POST['add'])) {
    $name = isset($_POST['jmeno']) ? realEscapeString($_POST['jmeno']) : '';
    $surname = isset($_POST['prijmeni']) ? realEscapeString($_POST['prijmeni']) : '';
    $phone = isset($_POST['telefon']) ? realEscapeString($_POST['telefon']) : '';
    $email = isset($_POST['email']) ? realEscapeString($_POST['email']) : '';

    $err = 0;
    if (!(is_string($name) && !empty($name))) $err++;
    if (!(is_string($surname) && !empty($surname))) $err++;
    if (!(is_string($name) && preg_match("/^[+]?[0-9]{1,4}?[0-9]{7,15}$/", $phone))) $err++;
    if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) $err++;

    if (!$err) {
        
        if (strlen($phone) == 9) $phone = "420$phone";

        query("INSERT INTO user SET
            name = '$name',
            surname = '$surname',
            phone = '$phone',
            email = '$email'
        ");

        addMessage('ok', 'Uživatel úspěšně přidán');
    } else {
        addMessage('error', 'Špatně vyplněná data');
    }

    redirect();
}
