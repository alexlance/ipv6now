<?php

$pages = array("home"    => array("menu"=>"home",    "label"=>"Home")
              ,"plan"    => array("menu"=>"plan",    "label"=>"Plan")
              ,"know"    => array("menu"=>"know",    "label"=>"Know")
              ,"use"     => array("menu"=>"use",     "label"=>"Use")
              ,"shop"    => array("menu"=>"shop",    "label"=>"Shop")
              ,"contact" => array("menu"=>"contact", "label"=>"Contact Us")
              );

isset($_GET["page"]) or $_GET["page"] = "home";
isset($pages[$_GET["page"]]) or $_GET["page"] = "home";

// Setup the menu
$menu = "";
$sep = "";
foreach ($pages as $k => $v) {
  $active = "";
  if (($_GET["page"] == $v["menu"] && $_GET["page"] == $k)
  || ($pages[$_GET["page"]]["menu"] == $k)) {
    $active = "menu-active";
  }
  $menu .= sprintf('%s <a href="/?page=%s" class="%s">%s</a>', $sep, $k, $active, $v["label"]);
  $sep = " ";
}
$menu = '<div id="menu">'.$menu.'</div>';

define("MENU", $menu);
define("PAGE", $_GET["page"]);

require_once(dirname(__FILE__)."/header.php");
require_once(dirname(__FILE__)."/".$_GET["page"].".php");
require_once(dirname(__FILE__)."/footer.php");
?>
