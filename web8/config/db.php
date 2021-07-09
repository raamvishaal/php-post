<?php
//create connection to var

$c=mysqli_connect('localhost','root','Csb1812@','phpblog');
//check conn
if(mysqli_connect_errno()){
	//connection failed
	echo 'failed to coonect'.mysqli_connect_errno();
}