<?php
	include_once 'favorite.php';
	session_start();
	$sessionName = 'fav1111';

	if (!isset($_SESSION[$sessionName]))
		$_SESSION[$sessionName] = new favoriteList();
	$fav = &$_SESSION[$sessionName];
?>
