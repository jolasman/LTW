<?php
  session_start();
  session_destroy();
 
header('Location: ../index.html');// vai para a pagina inicial
exit;
?>
