<?php
    session_start();

    //세션 유효기간 설정(12시간)
    $Usertime = 60 * 60 * 12;
    session_set_cookie_params($UserTime);
    
    
?>