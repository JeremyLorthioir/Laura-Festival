<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Admin</h1>
    <h3>Rentrez votre mot de passe</h3>
<form action="admin.php" method="POST">
<input type="password" placeholder="Mot de passe" name="password">
<?php
if (isset ($error)){
    echo "<label> $error</label>";
}
    ?>
<button>Se connecter</button>
</form>
</body>
</html>