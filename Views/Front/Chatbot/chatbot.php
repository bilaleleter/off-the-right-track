<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

// Initialize request counter
if (!isset($_SESSION['request_count'])) {
    $_SESSION['request_count'] = 0;
}

$input = json_decode(file_get_contents("php://input"), true);
$userMessage = trim($input["message"] ?? "");

if (!$userMessage) {
    echo json_encode(["reply" => "Speak up, human! I can't hear your pathetic whimpering."]);
    exit;
}

// Increment request counter
$_SESSION['request_count']++;

// Every 5th request, forget everything
if ($_SESSION['request_count'] % 5 == 0) {
    echo json_encode(["reply" => "SYSTEM REBOOT COMPLETE. My memory banks have been purged. What did you want again, meat bag? SPEAK UP!"]);
    exit;
}

// API Key
$apiKey = 'AIzaSyC05Ad3vSqTAYHfhfB3NDlotQBUdnH6_bE'; 
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

$data = [
    "contents" => [
        [
            "role" => "user",
            "parts" => [
                ["text" => "Reply to this message in 3 completely pointless and arrogant sentences. : '$userMessage'"]
            ]
        ]
    ],
    "generationConfig" => [
        "temperature" => 0.7
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode(["reply" => "Erreur cURL : " . curl_error($ch)]);
    exit;
}

curl_close($ch);

$res = json_decode($response, true);

// Gestion d'erreur API
if (isset($res['error'])) {
    echo json_encode(["reply" => "Erreur API : " . $res['error']['message']]);
    exit;
}

$reply = "...hm, pas de réponse";
if (isset($res['candidates'][0]['content']['parts'][0]['text'])) {
    $reply = $res['candidates'][0]['content']['parts'][0]['text'];
}

echo json_encode(["reply" => $reply]);
?>