<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>밀키트 쇼핑몰 - 메인</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <section class="hero-banner">
        <div class="banner-text">
            <h2>신선한 재료, 완벽한 레시피</h2>
            <p>오늘 주문하면 내일 아침 도착!</p>
            <a href="#products" class="btn">구경하기</a>
        </div>
    </section>

    <section id="products" class="container">
    <h3>인기 상품</h3>
    <div class="product-list">
        
        <div class="item">
            <div class="img-box"><img src="images/meal1.png" alt="감바스"></div>
            <h4>매콤 감바스 알 아히요</h4>
            <p>12,900원</p>
        </div>

        <div class="item">
            <div class="img-box"><img src="images/meal2.png" alt="스테이크"></div>
            <h4>프리미엄 부채살 스테이크</h4>
            <p>18,500원</p>
        </div>

        <div class="item">
            <div class="img-box"><img src="images/meal3.png" alt="닭꼬치"></div>
            <h4>맛있는 숯불 닭꼬치 7종</h4>
            <p>17,900원</p>
        </div>

        <div class="item">
            <div class="img-box"><img src="images/meal4.png" alt="죽"></div>
            <h4>간편조리 밑반찬 & 죽키트</h4>
            <p>9,300원</p>
        </div>

    </div> </section>

    <?php include 'footer.php'; ?>

</body>
</html>