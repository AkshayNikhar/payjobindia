<?php
// include language configuration file based on selected language

$lang = "en";
if (isset($_GET['lang'])) {
   $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}
if( isset( $_SESSION['lang'] ) ) {
    $lang = $_SESSION['lang'];
}else {
    $lang = "en";
}
require_once "back/assets/lang/" . $lang . ".php";
// require_once (base_url("back/assets/lang/" . $lang . ".php"));

?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">