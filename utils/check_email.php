<?php

$BASE_URL = " https://leakcheck.io/";
$END_POINT = "api?key=#yourkey";


function check_email($email) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://leakcheck.io/api?key=#yourkey&check=".$email."&type=email",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;   
}

function parse_data($data) {
    $data = json_decode($data, true);
    $my_array = [];
    foreach($data["result"] as $new_data) {
        array_push($my_array, $new_data["sources"]);
        array_push($my_array, $new_data["line"]);
    }
    return $my_array;

}

if(isset($_POST['scan'])) {
    $domain = escapeshellarg($_POST["domain"]);
    $domain = str_replace("'", "", $domain);
    $result = check_email($domain);
    $parsed_result = parse_data($result);
    file_put_contents($domain.".result.txt", json_encode($parsed_result,true));
    header("Location: http://localhost/email.php?email=$domain");
}

?>