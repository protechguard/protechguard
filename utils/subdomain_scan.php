<?php

if(isset($_POST['scan'])) {
    $domain = escapeshellarg($_POST["domain"]);
    $domain = str_replace("'", "", $domain);
    exec("./chaos-client -d $domain -key #yourkey -o sub$domain.txt");
    header("Location: http://localhost/subdomain.php?domain=$domain");
}else{echo "failed"; die();}

?>