<?php

//$position = 7;
//$user_token = 'MMMMMMMMMMMMMMMMMM';

$position = $_POST['position'];
$user_token = $_POST['user_token'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://pi.cp.su.ac.th/PI/QR/post_request.php',
    CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'position' => $position,
        'user_token' => $user_token
    )
));

curl_exec($curl);
curl_close($curl);
echo "success";