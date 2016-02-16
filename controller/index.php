<?php
ini_set("display_errors", 1);
ini_set("log_errors", 1);
ini_set("error_log", "php://stderr");
error_reporting(E_ALL);

require_once(__DIR__."/../vendor/autoload.php");
require_once(__DIR__."/../model/generated-conf/config.php");

use Jacwright\RestServer\RestServer;

$server = new RestServer("debug");
try {
  $server->addClass("\\BossEdu\\Controller\\AuthCtrl");
  $server->addClass("\\BossEdu\\Controller\\LectureCtrl");
  $server->addClass("\\BossEdu\\Controller\\InstructionCtrl");
  $server->addClass("\\BossEdu\\Controller\\PresentationCtrl");
  $server->addClass("\\BossEdu\\Controller\\DoubtCtrl");
  $server->addClass("\\BossEdu\\Controller\\ContributionCtrl");
  $server->handle();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
