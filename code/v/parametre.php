<?php 
require('../assets/includes/bootstrap.php');
$auth = App::getAuth();
$db = App::getDatabase();
?>
<h1>Competences</h1>
<div class="gauche">
    <div class="insidebox">
        <?php
        require_once('menuG.php');
        ?>
    </div>
</div>
<?php echo 'page parametre';