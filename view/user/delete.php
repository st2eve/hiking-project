<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'core/dbconnexion.php';

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$components = parse_url($url);
parse_str($components['query'], $results);

$delete = $connect->prepare('DELETE FROM hikes WHERE hikeID='.$results['id']);
$delete->execute();

header("Location: https://one-more-hike.herokuapp.com/profile?user=".$_SESSION['username']);

?>