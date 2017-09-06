<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?php 
	$aid = filter_input(INPUT_GET, 'aid', FILTER_VALIDATE_INT)
		or die('Missing/illegal ActorID parameter')
?>
	


<?php
	require_once('db_con.php');
	$sql = 'SELECT actor_id, first_name, last_name FROM actor where actor_id=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('i', $aid);
	$stmt->execute();
	$stmt->bind_result($aid, $name, $lastname);
	while($stmt->fetch()){ ?>
<h1>Actor's Information</h1>
    <ul>
        <li><a>Name: <?=$name?></a></li> 
        <li><a>Lastname: <?=$lastname?></a></li> 
    </ul>  
		
<?php } ?>

<h2>movies</h2>
<?php
$sql = 'SELECT film.title, film.film_id
					from  film, actor, film_actor
					WHERE film_actor.actor_id = actor.actor_id
					AND film_actor.film_id = film.film_id
					AND actor.actor_id = ?';
	require_once('db_con.php');
$stmt = $con->prepare($sql);
$stmt->bind_param('i', $aid);
$stmt->execute();
$stmt->bind_result($ftitle, $fid);
while($stmt->fetch()) {
	echo '<li><a href="actordetails.php?cid='.$fid.'">'.$ftitle.'</a></li>'.PHP_EOL;
}
?>


</body>
</html>