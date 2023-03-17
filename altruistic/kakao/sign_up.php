<?
$json_data = file_get_contents("php://input"); 
$obj_json = json_decode($json_data);

$kakao_id = $obj_json->userRequest->user->id;

$id = $obj_json->action->detailParams->id->value;
$name = $obj_json->action->detailParams->name->value;

$mysql_host = 'ksa18ky.synology.me:3307';
$mysql_user = 'ksa18ky';
$mysql_password = 'Kywtbas2002!';
$mysql_db = 'altruistic';

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$user_id = $id;
$username = $name;
$user_kakao = $kakao_id;

if($conn === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Attempt insert query execution
$sql = "INSERT INTO user_kakao ( user_id, username, user_kakao_id ) VALUES ( '$user_id', '$username', '$user_kakao' )";

$result = mysqli_query($conn,$sql);

// Close connection
mysqli_close($conn);

$text = '학번 : '.$id. ', 이름 : '.$name. ' 회원가입 완료되었습니다.';


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