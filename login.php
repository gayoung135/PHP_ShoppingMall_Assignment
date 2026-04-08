<?php
include 'db.php';
session_start();

// 사용자가 입력한 데이터 받기
$userId = $_POST['user_id']; 
$userPw = $_POST['password'];

if (isset($conn)) {
    // DB의 아이디 컬럼명이 'user_id'라고 가정했을 때
    $sql = "SELECT * FROM member WHERE user_id='$userId'"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if(!$row) {  
        echo "<script>alert('아이디가 일치하지 않습니다.'); history.back();</script>";
        exit;
    } else {
        // password_verify(사용자 입력 비번, DB에 저장된 암호화된 비번)
        if(!password_verify($userPw, $row['password'])) { 
            echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
            exit;
        } else {
            // 로그인 성공
            $_SESSION['userName'] = $row['user_name'];
            $_SESSION['userId'] = $row['user_id'];
            mysqli_close($conn);
            
            echo "<script>alert('로그인 성공!'); location.href='index.php';</script>";
        }
    }
} else {
    echo "입력된 아이디: " . $userId . "<br>";
    echo "현재 DB 연결이 없어 로그인은 진행되지 않습니다.";
}
?>