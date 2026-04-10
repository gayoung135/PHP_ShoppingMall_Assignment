<?php
$bestSeller = [
    ["name" => "매콤 감바스 알 아히요", "price" => "12,900원", "image" => "meal1.png"],
    ["name" => "프리미엄 부채살 스테이크", "price" => "18,500원", "image" => "meal2.png"],
    ["name" => "맛있는 숯불 닭꼬치 7종", "price" => "17,900원", "image" => "meal3.png"],
    ["name" => "간편조리 밑반찬 & 죽키트", "price" => "9,300원", "image" => "meal4.png"],
];

$products = [
    ["name" => "통새우 파스타", "price" => "9,980원", "sale" => "8,480원", "image" => "sale1.jpg"],
    ["name" => "매콤한 낙지볶음", "price" => "12,900원", "sale" => "11,610원", "image" => "sale2.jpg"],
    ["name" => "바삭 왕군만두", "price" => "7,900원", "sale" => "6,710원", "image" => "sale3.jpg"],
    ["name" => "얼큰 순대국밥", "price" => "9,900원", "sale" => "7,920원", "image" => "sale4.jpg"],
    ["name" => "데리야끼 닭다리 구이", "price" => "14,000원", "sale" => "11,480원", "image" => "sale5.jpg"],
    ["name" => "1인분 뼈해장국", "price" => "5,990원", "sale" => "5,690원", "image" => "sale6.png"],
    ["name" => "닭한마리 칼국수", "price" => "14,700원", "sale" => "12,940원", "image" => "sale7.jpg"],
    ["name" => "국물 떡볶이", "price" => "5,480원", "sale" => "5,040원", "image" => "sale8.jpg"],
];
?>

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
        <?php foreach ($bestSeller as $row): ?>
        <div class="item">
            <div class="img-box"><img src="images/<?= $row['image'] ?>" alt="<?=  $row['name'] ?>"></div>
            <h4><?=  $row['name'] ?></h4>
            <p><?= $row['price'] ?></p>
        </div>
        <?php endforeach; ?>
    </div> 

    <hr>
    <h3>할인 상품</h3>
    <div class="product-list">
        <?php foreach ($products as $row): ?>
        <div class="item">
            <div class="img-box"><img src="images/<?= $row['image'] ?>" alt="<?=  $row['name'] ?>"></div>
            <h4><?=  $row['name'] ?></h4>
            <p><del><?= $row['price'] ?></del> <?= $row['sale'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>