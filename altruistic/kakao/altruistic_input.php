<?
$json_data = file_get_contents("php://input"); 
$obj_json = json_decode($json_data);

$kakao_id = $obj_json->userRequest->user->id;

$subject = $obj_json->action->detailParams->subject->value;
$code_me = $obj_json->action->detailParams->code_me->origin;
$code_you = $obj_json->action->detailParams->code_you->origin;


$mysql_host = 'ksa18ky.synology.me:3307';
$mysql_user = 'ksa18ky';
$mysql_password = 'Kywtbas2002!';
$mysql_db = 'altruistic';

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$sql2 = "SELECT * FROM user_kakao WHERE user_kakao_id = '$kakao_id'";
$result2 = mysqli_query($conn,$sql2);
$row = mysqli_fetch_array( $result2 );

$id = $row['user_id'];
$name = $row['username'];
$s_name = $subject;
$me = $code_me;
$you = $code_you;
$success = 0;
$a_id = 0;

if($conn === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

$c_login = 0;

$sql2 = "SELECT * FROM user_kakao WHERE user_kakao_id = '$kakao_id'";
$result2 = mysqli_query($conn,$sql2);
while ($row = mysqli_fetch_array( $result2 )){
	$c_login = 1;
}

if ($c_login == 1){
// Attempt insert query execution
$sql = "INSERT INTO altruistic ( id, name, s_name, me, you, success ) VALUES ( '$id', '$name', '$s_name', '$me', '$you', '$success' )";

$result = mysqli_query($conn,$sql);

$sql2 = "SELECT * FROM altruistic WHERE id = '$id' and name = '$name' and s_name = '$s_name' and me = $me and you = $you and success = 0";

$result2 = mysqli_query($conn,$sql2);

while( $jb_row = mysqli_fetch_array( $result2 ) ) {
	$a_id = $jb_row['key_value'];
}

$sql_final = "INSERT INTO altruistic_success ( sell_id, sell_name, sell_class, buy_id, buy_name, buy_class, subject_name, match_time, altruistic_id, state, trade_cycle ) VALUES ( '$id', '$name', '$me', '0', '0', '$you', '$s_name', '0', '$a_id', '$success', '0' )";
$result_final = mysqli_query($conn,$sql_final);
}
 
// Close connection
mysqli_close($conn);

if ($c_login == 0){
	$text = '등록되지 않은 유저입니다. 회원가입을 먼저 해주시기 바랍니다.';
} else if ($c_login == 1){
	$text = '트레이드 신청 : '.$subject. ' ('. $code_me. ' -> '. $code_you. ')' ;
}


$jayParsedAry = [
	"version" => "2.0", 
	"template" => [
		"outputs" => [
			[
				"simpleText" => [
					"text" => $text
				]
			]
		]
	]
];

echo json_encode($jayParsedAry,JSON_UNESCAPED_UNICODE);

?>