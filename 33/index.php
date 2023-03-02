<?php
//include SOY2
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

SOY2::RootDir(WEBAPP_DIR . "src/");

$logic = SOY2Logic::createInstance("logic.SampleLogic");
$logic->setName("sample");
echo $logic->getName();

$logic = SOY2Logic::createInstance("logic.SampleLogic", array("name" => "sample"));
echo $logic->getName();