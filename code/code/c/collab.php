<?php
include '../v/head.html';

?>
<?php

    if (isset($_POST['gest_situation'])){
        include '../v/gestion_situation.php';
    }
    
    elseif (isset($_POST['competence'])){
        include '../v/competence.php';
    } 
    elseif (isset($_POST['tab_synth'])){
        include '../v/tab_synth.php';
    } 
    elseif (isset($_POST['parametre'])){
        include '../v/parametre.php';
    } 
    elseif (isset($_POST['contact'])){
        include '../v/contact.php';
    }

    elseif (isset($_POST['nvl_situation'])){
        include '../v/page2.php';
    } 
    elseif (isset($_POST['upsituation'])){
        include '../v/upsituation.php';
    } 
    else{
        include('../v/page2.php');
    }
    
?>

</body>
</html>