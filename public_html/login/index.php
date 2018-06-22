<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/view/TemplateEngine.php';

$te = new TemplateEngine();
$te->render("/src/template/base.phtml", [
	"title" => "Povium | 로그인",
	"main" => "template/login-main.phtml",
	"css" => '<link rel="stylesheet" href="/src/build/css/login.css">'
]);

?>
