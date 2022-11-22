<?php
$cn="fn";
$cv="anjalii";
setcookie($cn, $cv, time() + (86400*30));
?>
<html>

<head></head>
<body>
	<?php
	if(!isset($_COOKIE[$cn])) 
	{
		echo"cookie not set";
	}
	else
	{
		echo "COOKIE" .$cn."IS SET.<br>";
		echo "value is ".$_COOKIE[$cn];
	}
	?>
</body>
</html>>