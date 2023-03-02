<?php
include("config.php");

$logic = SOY2Logic::createInstance("logic.SampleLogic");
$logic->setName("sample");
echo $logic->getName();

$logic = SOY2Logic::createInstance("logic.SampleLogic", array("name" => "sample"));
echo $logic->getName();