<?php
 
// 요청을 받아 저장
$data = json_decode(file_get_contents('php://input'), true);
 
// 받은 요청에서 content 항목 설정
$content = $data["content"];
 
 
 
// 카테고리 버튼을 눌러을 때
if( $content == "카테고리" ){
echo
    {
        "message": {
            "text": "카테고리별 입력입니다."
        }
    }
}
 
 
 
// 2.'검색하기' 버튼 처리
else if( $content == "검색"){
echo
    {
        "message": {
            "text": "검색어를 입력하세요."
        }
    }    

}
 
 
// 3. '도움말'이란 단어가 포함되었을때 처리
else if( strpos($content, "도움말") !== false ){
echo
    {
        "message": {
            "text": "도움이 필요하신가요?"
        }
    }    

}
 
 
// 4. ELSE처리
else{
echo
    {
        "message": {
            "text": "ELSE"
        }
    }    

}
 
?>
