###   LOGIN  ###
Le login permet de voir si une personne est admin ou non

Pour se connecter, veuillez d'abord configurer le fichier models/connect.php avec vos identifiants:
------------------
    **ETUDIANT**:
        -COMPTE ADMIN: 
            *email*: abdoul@esti.mg
            *mdp*: abdoul  
        -COMPTE PUBLIC: 
            *email*: rivo@esti.mg
            *mdp*: rivo
    **PROFESSEUR**:
        -COMPTE ADMIN: 
            *email*: ndrina@esti.mg
            *mdp*: ndrina
        -COMPTE PUBLIC: 
            *email*: rochel@esti.mg
            *mdp*: rochel

###  GESTION D'ACCES  ###
Si l'utilisateur est admin:
    - il y aura les liens d'insertion (étudiant, cours , professeur)
    - il pourra modifier ou supprimer des lignes dans les listes (étudiant, professeur, cours)
    
Si l'utilisateur ne l'est pas:
    - il ne pourra pas insérer
    - il pourra voir les listes sans pour autant pouvoir les modifier ou les supprimer


