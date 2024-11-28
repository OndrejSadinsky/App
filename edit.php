<?php 
include 'html/header.php';

$redirect = false;
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id']) {
    $id = $conectDb->real_escape_string($_GET['id']);
    $result = query("SELECT * FROM user WHERE id = '$id'");
    if ($user = $result->fetch_array()) {
        $user['phone'] = str_replace('420', '', $user['phone']);
    } else $redirect = true;
} else {
    $redirect = true;
}

if ($redirect) {
    addMessage('error', 'Neplatná data');
    redirect();
}
?>   

    <div class="container">
        <div class="form-container">
            <header>
                <h1>Úprava uživatele</h1>
            </header>

            <form action="_inc/edit.php" method="POST">
                <label for="jmeno">Jméno*:</label>
                <input type="text" id="jmeno" name="jmeno" value="<?php echo htmlspecialchars($user['name']); ?>" required>

                <label for="prijmeni">Příjmení*:</label>
                <input type="text" id="prijmeni" name="prijmeni" value="<?php echo htmlspecialchars($user['surname']); ?>" required>

                <label for="email">Email*:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

                <label for="telefon">Telefon*:</label>
                <input type="tel" id="telefon" name="telefon" value="<?php echo htmlspecialchars($user['phone']); ?>" required pattern="[\+]?[0-9]{1,4}?[0-9]{7,15}">

                <input type="text" id="edit" name="edit" value="<?php echo htmlspecialchars($user['id']); ?>" hidden>

                <input type="submit" value="Uložit">
            </form>
        </div>
    </div>

<?php 
include 'html/footer.php';
?>

