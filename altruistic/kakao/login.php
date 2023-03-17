<?
$json_data = file_get_contents("php://input"); 
$obj_json = json_decode($json_data);

$kakao_id = $obj_json->userRequest->user->id;


$mysql_host = 'ksa18ky.synology.me:3307';
$mysql_user = 'ksa18ky';
$mysql_password = 'Kywtbas2002!';
$mysql_db = 'altruistic';

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$c_login = 0;

$sql2 = "SELECT * FROM user_kakao WHERE user_kakao_id = '$kakao_id'";
$result2 = mysqli_query($conn,$sql2);
while ($row = mysqli_fetch_array( $result2 )){
	$c_login = 1;
}

$id = $row['user_id'];
$name = $row['username'];


// Close connection
mysqli_close($conn);

if ($c_login == 0){
	$text = '등록되지 않은 유저입니다. 회원가입을 먼저 해주시기 바랍니다.';
} else if ($c_login == 1){
	$text = '학번 : '.$id. ', 이름 : '.$name. ' 으로 등록되어 있습니다.';
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