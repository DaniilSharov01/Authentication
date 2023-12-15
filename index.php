<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $submittedUsername = $_POST['username'];
        $submittedPassword = $_POST['password'];
        $filename = 'cfg_user.txt';
        
        if(file_exists($filename)) {
            $fileContent = file_get_contents($filename);
            $rows = explode("\n", $fileContent);

                foreach ($rows as $row) {
                    $credentials = explode ('|', trim($row));
                    
                    if(count($credentials) === 2) {
                        list($storedUsername, $storedPassword) = $credentials;

                        if($submittedUsername === $storedUsername && $submittedPassword === $storedPassword) {
                            header("Location: http://localhost/sps5/index2.php");
                            exit;
                        }
                    }
                } 
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cfg file edit</title>
    </head>
    <body>
        <h2>Authentifacation form</h2>
        <form method="POST" action="index.php">
            <label for="username">Username: </label>
            <input type="text" name="username" required> <br>
            <label for="password">Password: </label>
            <input type="password" name="password" required> <br>
            <input type="submit" value="Connect to config files"> <br>
        </form>
    </body>
</html>
