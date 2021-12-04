<?php
if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}
include_once("dbconnect.php");

$proid = $_POST['proid'];
$proname = $_POST['proname'];
$prodesc = $_POST['prodesc'];
$proquan = $_POST['proquan'];
$proprice = $_POST['proprice'];
$encoded_string = $_POST['image'];


$sqlinsert= "INSERT INTO products(proid, proname,prodesc,proquan,proprice) VALUES ('$proid','$proname','$prodesc','$proquan','$proprice')";

if ($conn->query($sqlinsert) === TRUE) {
    $response = array('status' => 'success', 'data' => null);
    $filename = mysqli_insert_id($conn);
    $decoded_string = base64_decode($encoded_string);
    $path = '../images/products/'.$filename.'.png';
    $is_written = file_put_contents($path, $decoded_string);
    sendJsonResponse($response);
} else {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
}


function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}

?>