<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>


<body>
 

 <?php
	$cid = filter_input(INPUT_GET, 'categoryid', FILTER_VALIDATE_INT)
		or die('Missing/illegal categoryid parameter');
?>

	<h1>Films in category <?=$cid?></h1>
	
	<ul>
	
<?php

	require_once('db_con.php');
	$sql = 'SELECT f.film_id, f.title
			FROM film f, film_category fc
			WHERE f.film_id=fc.film_id
			AND fc.category_id=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('i', $cid);
	$stmt->execute();
	$stmt->bind_result($fid, $ftitle);
	while($stmt->fetch()){ ?>
		
		<li><a href="filmdetails.php?filmid=<?=$fid?>"><?=$ftitle?></a></li>
		
<?php } ?>

</body>
</html>