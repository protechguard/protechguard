<?php
error_reporting(1);
ini_set("display_errors", true);


if(isset($_POST['scan'])) {
    $domain = escapeshellarg($_POST["domain"]);
    $domain = str_replace("'", "", $domain);
    exec("./nuclei -u http://$domain -o $domain.txt");
    header("Location: http://localhost/scan.php?domain=$domain");
}else{echo("failed"); die();}

?>
