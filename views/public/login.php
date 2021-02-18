<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/assets/css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">          
            <form action="controllers/verification.php" method="POST">
                <h1>Connexion</h1>                
                <label><b>Email</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="email" required>
                <label><b>Mot de passe</b></label>
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