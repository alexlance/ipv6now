<?php

// The list of website versions that are in play
$versions = array("v1");
//eg: $versions = array("version1", "version2", "version3");

// If we've already established that the user is looking
// at one particular version of the website, we don't want
// to flip them to a different version, so use the cookie
// we set last time.
if ($_COOKIE["version"]) {
  in_array($_COOKIE["version"], $versions) or $_COOKIE["version"] = $versions[0];
  define("VERSION", $_COOKIE["version"]);
  define("COOKIE_STATUS","USING COOKIE: ".VERSION);

// If they're a new visitor, give them a random version and
// set a cookie that glues them to that version for a day
} else {
  $v = rand(1,count($versions)) - 1;
  define("VERSION", $versions[$v]);
  define("COOKIE_STATUS","SETTING COOKIE: ".VERSION);
  setcookie("version", VERSION, time()+(60*60*24));
}

// Load the particular version of the website
require_once("./".VERSION."/index.php");

?>
