<?php
session_start();
if(!(isset($_SESSION['email']) && isset($_SESSION['code'])))
{
   echo "FALSE";
}
else if($_SESSION['code']==200)
{
  echo "TRUE";
}
else {
  echo "FALSE";
}
?>
