<?php
session_start();
include 'db.php';

$user_id = $_POST['user_id'];
$password = $_POST['password'];

// DB에서 아이디 찾기
$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// 비밀번호 검증 (password_verify 사용!)
if ($user && password_verify($password, $user['password'])) {
    // 로그인 성공
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_name'] = $user['user_name'];
    
    echo "<script>alert('로그인 성공!'); location.href='index.php';</script>";
} else {
    // 로그인 실패
    echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); history.back();</script>";
}
?>