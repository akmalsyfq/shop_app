<?php
if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    echo "failed";
    die();
}
include_once("dbconnect.php");

$email = $_POST['email'];
$password = sha1($_POST['password']);
$sqllogin = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

$result = $conn->query($sqllogin);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
        $userlist = array();
        $userlist['id'] = $row['id'];
        $userlist['name'] = $row['name'];
        $userlist['email'] = $row['email'];
        $userlist['phone'] = $row['phone'];
        $userlist['address'] = $row['address'];
        $userlist['otp'] = $row['otp'];
        echo json_encode($userlist);
        $conn->close();
        return;
    }
}else{
    echo "failed";
}
?>