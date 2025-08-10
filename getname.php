<?php
header("Content-Type: application/json; charset=UTF-8");

if (!isset($_GET['uid'])) {
    echo json_encode(["error" => "No UID provided"]);
    exit;
}

$uid = $_GET['uid'];
$url = "https://shop.garena.my/app/100067/id?uid={$uid}";

// Garena পেজ লোড করা
$html = file_get_contents($url);

// নাম বের করা (HTML থেকে স্ক্র্যাপিং)
preg_match('/<div class="name">(.*?)<\/div>/', $html, $matches);

if (isset($matches[1])) {
    echo json_encode(["name" => trim($matches[1])]);
} else {
    echo json_encode(["name" => null]);
}
?>
