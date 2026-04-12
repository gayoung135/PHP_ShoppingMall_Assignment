<?php
// 아이디 중복 확인
include 'db.php';

// 자바스크립트 GET 방식 보냄 -> 받기 위해 $_GET 사용
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
} else {
    echo "invalid";
    exit;
}

// Check. if the Id is empty.
if (empty($userId)) {
    echo "empty";
    exit;
}

// DB 조회 (따옴표 주의)
$sql = "SELECT * FROM users WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "exists"; // DB에 있음 (중복됨)
} else {
    echo "available"; // DB에 없음 (사용 가능)
}
?>
