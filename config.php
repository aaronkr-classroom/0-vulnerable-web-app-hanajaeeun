<?php
//보안 설정 로드 (환경 변수 또는 외부 설정 파일)
require_once __DIR__ . '/config-var.php';

//Connection to database
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//연결 오류 처리
if (!$db) {
    //에러 로그 파이렝 기록
}
 or die('Error connecting to MySQL server.');
?>
