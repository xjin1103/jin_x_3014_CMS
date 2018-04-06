<?php
	require_once('phpscripts/config.php');
	// did the calculation at function.php
	$result = multireturns(17);
	list($add, $multiply) = $result;
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
</head>
<body>
	<?php
		echo "Result 1: {$result[0]}<br>";
		echo "Result 2: {$result[1]}<br>";
		echo "Result 1 from list: {$add}<br>";
		echo "Result 2 from list: {$multiply}";
	?>

</body>
</html>
