<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <!-- <link rel="stylesheet" href="/assets/css/style.css" media="screen" type="text/css" /> -->
        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <body>
        <div id="container">          
            <form class="box" action="controllers/verification.php" method="POST">
                <h1>Login</h1>                
                <input type="text" placeholder="Entrer l'email d'utilisateur" name="email" autocomplete="off" required>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>

    </body>
</html>