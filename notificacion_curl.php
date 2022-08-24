<?php 

$message = "Hola desde PHP 2";
$title = "Notificaciones descript";
$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
$server_key = "XXXX";

$deviceToken = "cBFWyhk6QYa7nxnUXvAjJx:APA91bEyMgQ40GzUyPBYDPJSpUkoggFGl9P7ww1gd6qGiwlSOit4SbU39AaJppkkD2EVffTCtQDS05kYigwGA61IzKPD2psl_tBnoAwBGlbKFSRDBiMc0HomHe_XxWVkZs1R6NoWL8j0";
$headers = array(
    'Authorization:key=' .$server_key,
    'Content-Type:application/json'
);

$fields = array('to'=>$deviceToken,
    'notification'=>array('title'=>$title,'body'=>$message));

$payload = json_encode($fields);

echo $payload;

$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
$result = curl_exec($curl_session);
echo $result;

?>