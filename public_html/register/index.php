<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/class/view/TemplateEngine.php';

$te = new TemplateEngine();
$te->render("/src/template/base.phtml", [
	"title" => "Povium | 회원가입",
	"main" => "template/register.phtml",
	"css" => '<link rel="stylesheet" href="/src/build/css/register.css">',
	"script" => '<script src="js/register.js"></script>'
]);

?>
