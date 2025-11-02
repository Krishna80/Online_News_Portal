<?php
//Retriving the name of category from database
$print = $pdo->prepare("SELECT name FROM category");
$print->execute();
$link='$pdo';
	foreach ($print as $line) {
	
		$name=$line['name'];
		$link='<div class="verse"><a href="#">'.$name.'</a></div>';
echo '<li>';
echo $link;
	}
echo '<ul>';

?>

		
