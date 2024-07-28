<?php
//              Hostname    username password   databasename
$con = mysqli_connect('localhost','root','','sms');
if($con == false)
{
    echo "Connection is not done!";
}
?>