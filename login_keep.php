<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 로그인 상태인지 확인
$isLoggedIn = isset($_SESSION['userId']);
$userName = $isLoggedIn ? $_SESSION['userName'] : "";
?>