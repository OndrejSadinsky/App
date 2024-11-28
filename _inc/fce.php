<?php

# DB --------------------------------------------------
function query($query) {
    global $conectDb;

    $result = $conectDb->query($query);

    $conectDb->close();

    return $result;
}

function realEscapeString($data) {
    global $conectDb;
    return $conectDb->real_escape_string($data);
}

# APP -------------------------------------------------
function redirect($redirect_url = 'index') {
    global $url;

    header("Location:$url/$redirect_url.php");
    exit;
}

function addMessage($type, $msg) {
    $_SESSION['message'] = array($type => $msg);
}


