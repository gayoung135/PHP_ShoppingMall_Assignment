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
    <title>로그인</title>
    <style>
        /*  전체 배경 스타일 (로그인 창과 통일) */
        body {
            font-family: 'Noto Sans KR', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        /* login-container로 이름만 변경하고 스타일 유지 */
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 { color: #2c3e50; text-align: center; margin-bottom: 30px; }
        
        .input-group { margin-bottom: 20px; } /* 로그인은 메시지 칸이 적어 간격을 조금 더 넓힘 */
        label { display: block; margin-bottom: 8px; color: #666; font-size: 14px; }
        
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        /* 로그인 버튼 - 가입하기 버튼 색상(#219150) 유지 */
        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #219150;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
        .submit-btn:hover { background-color: #2D6A4F; }

        /* 하단 링크 (회원가입 페이지 이동 등) -- 기존 login.php에 없어 추가함. */
        .footer-links {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #7f8c8d;
        }
        .footer-links a {
            color: #34495e;
            text-decoration: none;
            font-weight: bold;
        }
        .footer-links a:hover { text-decoration: underline; }
    </style>
</head>

<body>
<div class="login-container">
    <h2>로그인</h2>
    <form action="login_process.php" method="POST">
        <div class="input-group">
            <label>아이디</label>
            <input type="text" name="user_id" placeholder="아이디를 입력하세요" required>
        </div>

        <div class="input-group">
            <label>비밀번호</label>
            <input type="password" name="password" placeholder="비밀번호를 입력하세요" required>
        </div>

        <button type="submit" class="submit-btn">로그인</button>
    </form>

    <div class="footer-links">
        계정이 없으면 회원가입하세요! <a href="register.php">회원가입</a>
    </div>
</div>

</body>
</html>





