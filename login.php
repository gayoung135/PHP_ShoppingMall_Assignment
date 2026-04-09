<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 사용자가 입력한 데이터 받기
    $userId = $_POST['user_id']; 
    $userPw = $_POST['password'];

    if (isset($conn)) {
        $sql = "SELECT * FROM users WHERE user_id='$userId'"; 
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if(!$row) {  
            echo "<script>alert('아이디가 일치하지 않습니다.'); history.back();</script>";
            exit;
        } else {
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
    }
} 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인 페이지</title>
</head>
<body>
    <h2>로그인</h2>
    
    <form action="login.php" method="POST">
        <div>
            <label for="user_id">아이디:</label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        
        <br>
        
        <div>
            <label for="password">비밀번호:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <br>
        
        <div>
            <button type="submit">로그인</button>
            <button type="button" onclick="location.href='register.php'">회원가입</button>
        </div>
    </form>
</body>
</html>