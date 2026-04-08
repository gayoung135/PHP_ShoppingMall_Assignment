<?php
// 아이디 중복 확인
include 'db.php';

$userId = $_POST['user_id'];
$sql = "SELECT * FROM users WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "exists"; // 중복된 아이디
} else {
    echo "available"; // 사용 가능
}
?>
