<?php
  $nome = 'gilberto';
  $email= 'lucassoeiro03@gmail.com';
  $mensagem= 'hjgjhghjgjhg';
  $to = "contato@exemplo.com.br";
  $assunto = "Mensagem de $email.com";
  
  ini_set(sendmail_from,'from@example.com'); 

  mail($to,$assunto,$mensagem);

?>