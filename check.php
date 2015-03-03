<?php
if($response)
{
header('location:lets.php');	
}else
{
	echo "username or password invalid";
    file_put_contents($file, '');

}
