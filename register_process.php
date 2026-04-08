<?php
// 데이터 검증과 데이터 저장
include 'db.php';

$userId = $_POST['user_id'];
$userName = $_POST['user_name'];
$password = $_POST['password'];

// 1. 유효성 검사 (빈 칸 확인)
if (empty($userId) || empty($userName) || empty($password)) {
    echo "<script>alert('모든 필드를 입력해주세요.'); history.back();</script>";
    exit();
}

// 2. 비밀번호 암호화 (보안 로직)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 3. DB 저장
$sql = "INSERT INTO users (user_id, password, user_name) VALUES ('$userId', '$hashedPassword', '$userName')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('회원가입이 완료되었습니다!'); location.href='login.php';</script>";
} else {
    echo "오류 발생: " . mysqli_error($conn);
}
?>
