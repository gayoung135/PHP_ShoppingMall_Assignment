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
            <?php
            // 나중에 로그인 팀원이 세션 처리를 할 곳입니다.
            session_start();
            if(isset($_SESSION['user_id'])) {
                echo '<a href="logout.php">로그아웃</a>';
                echo '<a href="mypage.php">마이페이지</a>';
            } else {
                echo '<a href="login.php">로그인</a>';
                echo '<a href="register.php">회원가입</a>';
            }
            ?>
        </div>
    </nav>
</header>