<?php
    //세션 시작
    session_start();

    //모든 세션 변수 해제
    $_SESSION = array();

    //세션 쿠키 삭제
    if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

    //세션 데이터 완전히 파괴
    session_destroy();

    //로그아웃 후 로그인 페이지로 이동
    header("Location: login.php");
?>