<?php 
include 'html/header.php';

$users = query("SELECT * FROM user");
?>  

    <?php
        if (isset($_SESSION['message'])) {
            foreach($_SESSION['message'] as $type => $message) {
                $class = $type == 'ok' ? 'message-ok' : 'message-error';
                echo '<div class="' . $class . '">' . $message . '</div>';
            }
            unset($_SESSION['message']);
        }   
    ?>
    <div class="container">
        <div class="form-container">
            <header>
                <h1>Přidávání uživatele</h1>
            </header>

            <form action="_inc/add.php" method="POST">
                <label for="jmeno">Jméno*:</label>
                <input type="text" id="jmeno" name="jmeno" required>

                <label for="prijmeni">Příjmení*:</label>
                <input type="text" id="prijmeni" name="prijmeni" required>

                <label for="email">Email*:</label>
                <input type="email" id="email" name="email" required>

                <label for="telefon">Telefon*:</label>
                <input type="tel" id="telefon" name="telefon" required pattern="[\+]?[0-9]{1,4}?[0-9]{7,15}">

                <input type="text" id="add" name="add" value="1" hidden>

                <input type="submit" value="Uložit">
            </form>
        </div>

        <div class="table-container">
            <header>
                <h1>Výpis uživatelů</h1>
            </header>
            <?php if ($users->num_rows) { ?>
                <table>
                    <thead>
                        <th>Jméno</th>
                        <th>Přijmení</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php
                        while ($user = $users->fetch_array()) {
                            $user = array_map("htmlspecialchars", $user);
                            echo '<tr>';
                            echo '<td>'. $user['name']  .'</td>';
                            echo '<td>'. $user['surname']  .'</td>';
                            echo '<td>'. $user['phone']  .'</td>';
                            echo '<td>'. $user['email']  .'</td>';
                            echo '<td><a href="edit.php?id='. $user['id'] .'" class="edit-link">Edit</a></td>';
                            echo '<td><a href="_inc/delete.php?id='. $user['id'] .'" onclick="showAlert(\'Opravdu si přejete smazat uživatel?\', \'_inc/delete.php?id='. $user['id'] .'\'); return false;" class="delete-link">Delete</a></td>';
                            echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
            <?php  
            } else {
                echo '<div class="message-info">Zatím nebyl přidán žádný uživatel</div>';
            } 
            ?>
        </div>
    </div>
  

<?php 
include 'html/footer.php';
?>

