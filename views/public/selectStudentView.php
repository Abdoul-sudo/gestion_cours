<div class="div">
<?php 
    require_once ('models/user.php');
	require_once ('controllers/function.php');

    $studentTab = listPotentialRecipients();
    $i = 1;
    
    foreach ($studentTab as $val){
        ?>        
            <input type="checkbox" id=<?='email_'.$i?> name="recipient[]" value="<?php echo $val['id_etudiant']?>">
            <label for=<?='email_'.$i?>><?=strtoupper($val['nom_etudiant'])?> <?=ucfirst($val['prenom_etudiant'])?></label><br>   
              

        <?php
        $i++;
    }
?>
 </div> 