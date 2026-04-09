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
            //로그인하는데 이상한 글씨가 나와서 <span>코드 추가했습니다!(혜인)
            // 나중에 로그인 팀원이 세션 처리를 할 곳입니다.
            session_start();
            if(isset($_SESSION['user_id'])) {
                echo '<span class="welcome-text"><strong>' . $_SESSION['userName'] . '</strong>님 환영합니다!</span>';
                echo '<a href="logout.php">로그아웃</a>';
                echo '<a href="mypage.php">마이페이지</a>';
            } else {
                echo '<a href="login.php">로그인</a>';
                echo '<a href="register.php">회원가입</a>';
            }
            ?>
</div>
        </div>
    </nav>
</header>