<form action="register_process.php" method="POST">
    <!-- 회원가입 -->
    아이디: <input type="text" name="user_id" id="user_id" required>
    <button type="button" onclick="checkDuplicate()">중복확인</button>
    <p id="msg"></p> <!-- 결과 메시지 출력 -->
    
    비밀번호: <input type="password" name="password" required><br>
    이름: <input type="text" name="user_name" required><br>
    <button type="submit">가입하기</button>
</form>

<script>
function checkDuplicate() {
    var userId = document.getElementById('user_id').value;
    if(userId == "") { alert("아이디를 입력하세요"); return; }

    // 서버에 물어보기 (중복 체크)
    fetch('check_id.php?user_id=' + userId)
    .then(res => res.text())
    .then(data => {
        var msg = document.getElementById('msg');
        if(data == "exists") {
            msg.innerText = "이미 있는 아이디입니다.";
            msg.style.color = "red";
        } else {
            msg.innerText = "사용 가능한 아이디입니다.";
            msg.style.color = "green";
        }
    });
}
</script>
