<?php
// 헤더부분 상단에 세션이 없을때만 실행하는 코드로 수정 (혜인)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">🥗 FreshMeal</a>
        </div>
        <ul class="nav-links">
            <li><a href="#">전체메뉴</a></li>
            <li><a href="#">베스트</a></li>
            <li><a href="#">정기구독</a></li>
        </ul>
        <div class="user-menu">
    <div class="user-menu">
 <?php
  // login_process.php 추가로 로그인 로직 수정함 (혜인)
  // 세션에 저장된 user_id가 있는지 확인
  if (isset($_SESSION['user_id'])) {
      // 로그인 된 상태
      echo $_SESSION['user_name'] . "님 환영합니다! ";
      echo "<a href='logout.php'>로그아웃</a>";
  } else {
      // 로그인 안 된 상태
      echo "<a href='login.php'>로그인</a> ";
      echo "<a href='register.php'>회원가입</a>";
  }
?>
</div>
        </div>
    </nav>
</header>