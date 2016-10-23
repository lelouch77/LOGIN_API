<?php
$code=$_POST['code'];
session_start();
if(!(isset($_SESSION['email']) && isset($_SESSION['code'])))
{
   echo "FALSE 1".$_SESSION['email']."__";
}
else if($code==$_SESSION['code']) {
  $_SESSION['code']=200;
  echo "TRUE";
}
else {
  echo "FALSE".$_SESSION['code']."__";
}
?>
