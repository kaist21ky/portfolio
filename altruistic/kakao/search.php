<?
$json_data = file_get_contents("php://input"); 
$obj_json = json_decode($json_data);

$keyword = $obj_json->action->detailParams->subject->value;


$mysql_host = 'ksa18ky.synology.me:3307';
$mysql_user = 'ksa18ky';
$mysql_password = 'Kywtbas2002!';
$mysql_db = 'altruistic';
$c = 0;

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if($conn === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "SELECT * FROM altruistic WHERE s_name = '$keyword' AND success = 0";

$result = mysqli_query($conn,$sql);


$text .= '|';

while( $jb_row = mysqli_fetch_array( $result ) ) {
	
	$text .= $jb_row['name'].' : ('. $jb_row['me']. ' → '. $jb_row['you']. ') | ';
	$c += 1;
}
if ($c == 0){
	$text = '해당 과목의 데이터가 존재하지 않습니다.';
}

// Close connection
mysqli_close($conn);


/*
$jayParsedAry = [
	"version" => "2.0", 
	"data" => [
		"msg" => "hi",
		"name" => "Ryan",
		"position" => "Senior Managing Director"
	]
];
*/

$jayParsedAry = [
  "version" => "2.0",
  "template" => [
    "outputs" => [
      [
        "basicCard" => [
          "title" => $keyword,
          "description" => $text,
          "thumbnail" => [
            "imageUrl" => "http://ksa18ky.synology.me/altruistic/kakao/background.jpg"
          ],
          "buttons" => [
            [
              "action" =>  "webLink",
              "label" => "웹에서 보기",
              "webLinkUrl" => "http://ksa18ky.synology.me/altruistic/search.php?keyword=".$keyword
            ]
          ]
        ]
      ]
    ]
  ]
];

echo json_encode($jayParsedAry,JSON_UNESCAPED_UNICODE);
?>