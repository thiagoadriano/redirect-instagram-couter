<?php
require('db.php');

require_once 'libraries/Mobile_Detect.php';

$detect = new Mobile_Detect();
$arrobaClient = '';

$url = $_SERVER['REQUEST_URI'];
$id = explode('/', $url);

$id = end($id);

if ($id == 'instagram') {
	if ( $detect->isAndroidOS() ) {
		header("Location: intent://www.instagram.com/".$arrobaClient."/#Intent;package=com.instagram.android;scheme=https;end");
		exit();
	} 
	
	if ( $detect->isiOS() ) {
		header("Location: instagram://user?username=".$arrobaClient."");
		exit();
	}

	header("Location: https://www.instagram.com/".$arrobaClient."/?hl=pt-br");
	exit();
}

$id = (int) $id;

$stmt = $pdo->prepare("SELECT * FROM youtube WHERE id=? LIMIT 1"); 
$stmt->execute([$id]);
$youtube = $stmt->fetch();

if( ! $youtube['url']) {
	header("HTTP/1.0 404 Not Found");
	exit();
}


if ( $detect->isAndroidOS() ) {
	$stmt = $pdo->prepare("UPDATE `youtube` SET `android_count` = `android_count` + 1 WHERE `id` =:id ");
	$stmt->execute(array(':id' => $id));
	$redirect = str_replace('https', 'vnd.youtube', $youtube['url']);
    header("Location: " . $redirect);
    exit();
} 

if ( $detect->isiOS() ) {
	$stmt = $pdo->prepare("UPDATE `youtube` SET `ios_count` = `ios_count` + 1 WHERE `id` =:id ");
	$stmt->execute(array(':id' => $id));
	$redirect = str_replace('https', 'youtube', $youtube['url']);
    header("Location: " . $redirect);
    exit();
}

$stmt = $pdo->prepare("UPDATE `youtube` SET `desktop_count` = `desktop_count` + 1 WHERE `id` =:id ");
$stmt->execute(array(':id' => $id));
header("Location: " . $youtube['url']);
exit();