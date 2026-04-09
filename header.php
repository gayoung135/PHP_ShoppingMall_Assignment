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
    //기존 코드랑 제가 쓴 코드가 안맞아서 ui에 맞게끔 수정했습니다(혜인)
    // 세션 처리 시작
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // login.php에서 만든 세션 변수(userId)가 있는지 확인
    if(isset($_SESSION['userId'])) {
        // 로그인 상태일 때 출력되는 내용
        echo '<span class="welcome-text"><strong>' . $_SESSION['userName'] . '</strong>님 환영합니다!</span>';
        echo '<a href="logout.php">로그아웃</a>';
        echo '<a href="mypage.php">마이페이지</a>';
    } else {
        // 로그인하지 않았을 때 출력되는 내용
        echo '<a href="login.php">로그인</a>';
        echo '<a href="register.php">회원가입</a>';
    }
    ?>
</div>
        </div>
    </nav>
</header>