<?php

// 아이디,비밀번호 값
$users = 'dlrnjsdyd';
$pw = '123456';

//홈페이지에서 들어오는 값
$username = $_POST['userName'];
$password = $_POST['userPassword'];

// 사용자 확인
if (($username==$users) &&($password==$pw)) {
    echo "Login success!";
    
} else {
    echo "Login Failed";
}
?>
