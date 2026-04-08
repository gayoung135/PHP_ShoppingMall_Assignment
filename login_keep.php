<?php
//세션 유효기간 설정부분만 있어서 나머지 코드들도 추가후 수정했습니다!


    //세션 유효기간 설정 (12시간)
    $UserTime = 60 * 60 * 12;
    
    session_set_cookie_params($UserTime);

    //세션 시작 (중복 시작 방지 포함)
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); 
    }

    //로그인 상태 확인 및 데이터 기억하기
    if (isset($_SESSION['userId'])) {
        $isLoggedIn = true;
        $currentUserId = $_SESSION['userId'];
        $currentUserName = $_SESSION['userName'];
    } else {
        $isLoggedIn = false;
        $currentUserId = "";
        $currentUserName = "게스트";
    }
?>