<style>
    /* 전체 배경 스타일 (로그인 창과 통일) */
    body {
        font-family: 'Noto Sans KR', sans-serif;
        background-color: #f4f7f6;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .register-container {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        width: 400px;
    }
    h2 { color: #2c3e50; text-align: center; margin-bottom: 30px; }
    /* 기본 그룹 간격을 좁게 유지합니다 */
    .input-group { margin-bottom: 5px; }
    label { display: block; margin-bottom: 5px; color: #666; font-size: 14px; }
    
    /* 입력창 스타일 */
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
    }

    /* 아이디 입력칸과 중복확인 버튼 나란히 배치 */
    .id-check-group { display: flex; gap: 10px; margin-bottom: 5px; }
    .id-check-group input { flex: 1; }
    .check-btn {
        width: 100px;
        background-color: #34495e;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
    }
    
    /* 메시지 스타일 (아이디 및 비밀번호 공통) */
    /* 초기에는 min-height를 0으로 설정하여 간격을 없앱니다 */
    #msg, #pw_msg, #pw_re_msg, #name_msg { 
        font-size: 13px; 
        margin: 0; 
        min-height: 0; 
        transition: all 0.2s; /* 부드럽게 간격이 벌어지도록 설정 */
    }

    /* 메시지가 표시될 때만 간격을 확보하는 클래스 */
    .active-msg {
        margin: 5px 0 15px 0 !important;
        min-height: 18px !important;
    }

    /* 가입하기 버튼 */
    .submit-btn {
        width: 100%;
        padding: 15px;
        background-color: #219150;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
    }
    .submit-btn:hover { background-color: #2D6A4F; }
</style>

<div class="register-container">
    <h2>회원가입</h2>
    <!-- 폼 제출 전 비밀번호 확인: onsubmit -->
    <!-- 브라우저 기본 말풍선 off: novalidate -->
    <form action="register_process.php" method="POST" onsubmit="return validateForm()" novalidate>
        <div class="input-group">
            <label>아이디</label>
            <div class="id-check-group">
                <input type="text" name="user_id" id="user_id" placeholder="아이디 입력 (4~20자)" oninput="isIdChecked = false" required>
                <button type="button" class="check-btn" onclick="checkDuplicate()">중복확인</button>
            </div>
            <p id="msg"></p> <!-- 결과 메시지 출력 -->
        </div>

        <div class="input-group">
            <label>비밀번호</label>
            <!-- 실시간 검증을 위해 oninput="checkPassword()" 추가 -->
            <input type="password" name="password" id="password" 
                   placeholder="영문, 숫자, 특수문자 포함 8~20자"
                   pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$"
                   oninput="checkPassword()"
                   required>
            <p id="pw_msg"></p> <!-- 비밀번호 유효성 메시지 출력 -->
        </div>

        <div class="input-group">
            <label>비밀번호 확인</label>
            <!-- 비밀번호 일치 확인을 위해 실시간 검사 추가 가능 -->
            <input type="password" name="password_re" id="password_re" placeholder="비밀번호 재입력" oninput="checkPasswordMatch()" required>
            <p id="pw_re_msg"></p> <!-- 간격을 맞추기 위해 메시지 태그 추가 -->
        </div>

        <div class="input-group">
            <label>이름</label>
            <input type="text" name="user_name" placeholder="이름을 입력하세요" required>
            <p id="name_msg"></p> <!-- 간격을 맞추기 위해 메시지 태그 추가 -->
        </div>

        <button type="submit" class="submit-btn">가입하기</button>
    </form>
</div>

<script>
let isIdChecked = false; // 중복 확인 여부 변수

// 메시지와 간격을 제어하는 보조 함수
function updateMsg(el, text, color) {
    if (text) {
        el.innerText = text;
        el.style.color = color;
        el.classList.add('active-msg');
    } else {
        el.innerText = "";
        el.classList.remove('active-msg');
    }
}

// 아이디 중복 확인 기능
function checkDuplicate() {
    var userId = document.getElementById('user_id').value;
    var msg = document.getElementById('msg');
    if(userId == "") { 
        updateMsg(msg, "아이디를 입력해주세요.", "orange");
        return; 
    }

    // 서버에 물어보기 (중복 체크)
    fetch('check_id.php?user_id=' + userId)
    .then(res => res.text())
    .then(data => {
        if(data.trim() == "exists") {
            updateMsg(msg, "이미 사용 중인 아이디입니다.", "#e74c3c"); // 빨간색
            isIdChecked = false;
        } else {
            updateMsg(msg, "사용 가능한 아이디입니다.", "#27ae60"); // 초록색
            // 중복 확인 안 하고 가입 방지 변수
            // 기존 fetch 코드 내부에서 사용 가능할 때
            isIdChecked = true; // 사용 가능할 때 -> true
        }
    });
}

// 비밀번호 실시간 유효성 검사 기능
function checkPassword() {
    var pw = document.getElementById('password').value;
    var pwMsg = document.getElementById('pw_msg');
    // HTML pattern과 동일한 정규식
    var pwPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/;

    if (pw === "") {
        updateMsg(pwMsg, "", "");
    } else if (!pwPattern.test(pw)) {
        updateMsg(pwMsg, "문자, 숫자, 특수문자를 포함하여 8~20자로 입력해주세요.", "#e74c3c"); // 빨간색
    } else {
        updateMsg(pwMsg, "안전한 비밀번호입니다.", "#27ae60"); // 초록색
    }
    // 비밀번호가 수정될 때 확인 칸과의 일치 여부도 다시 체크합니다
    if(typeof checkPasswordMatch === 'function') checkPasswordMatch();
}

// 비밀번호 확인 실시간 검사 (간격을 활용한 추가 기능)
function checkPasswordMatch() {
    var pw = document.getElementById('password').value;
    var pwRe = document.getElementById('password_re').value;
    var pwReMsg = document.getElementById('pw_re_msg');

    if (pwRe === "") {
        updateMsg(pwReMsg, "", "");
    } else if (pw !== pwRe) {
        updateMsg(pwReMsg, "비밀번호가 일치하지 않습니다.", "#e74c3c");
    } else {
        updateMsg(pwReMsg, "비밀번호가 일치합니다.", "#27ae60");
    }
}

// 폼 제출 전 유효성 검사 (비밀번호 일치 확인)
function validateForm() {
    // 1. 아이디 중복 확인 체크
    if (!isIdChecked) {
        alert("아이디 중복 확인을 먼저 진행해주세요.");
        return false;
    }

    // 2. 비밀번호 형식 최종 체크 (말풍선 대신 alert이나 메시지 활용)
    var pw = document.getElementById('password').value;
    var pwPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/;
    
    if (!pwPattern.test(pw)) {
        alert("비밀번호 형식을 확인해주세요.");
        document.getElementById('password').focus();
        return false;
    }

    // 3. 비밀번호 일치 확인
    var pwRe = document.getElementById('password_re').value;
    if (pw !== pwRe) {
        alert("비밀번호가 일치하지 않습니다.");
        return false; // 제출 방지
    }
    return true; // 제출 진행
}
</script>
