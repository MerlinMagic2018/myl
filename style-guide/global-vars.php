<?php
	//ini_set('display_errors', 1);

	$rootUrl = $_SERVER['DOCUMENT_ROOT'];

	$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$hostname = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

	$homeurl = $_SERVER['REQUEST_URI'];

	$rootUrl = $content['urls']['root'];
	$siteTitle = $content['general']['title'];
	//$indexMeta = $content['general']['description'];
	$keyz = $content['general']['keywords'];

?>