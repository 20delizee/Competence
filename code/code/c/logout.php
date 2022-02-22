<?php
require('../assets/includes/bootstrap.php');
App::getAuth()->logout();
Session::getInstance()->sendFlash('success', 'Vous êtes à présent déconnecté');
App::redirect('index.php');
?>
