<?php
use Povium\Base\TemplateEngine;

$te = new TemplateEngine();
$te->render("/resources/templates/base.phtml", [
	"title" => "Povium | 로그인",
	"main" => "/resources/templates/login-main.phtml",
	"script" => '<script src="/build/js/login.built.js"></script>'
]);