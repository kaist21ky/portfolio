<?php

	include 'inc_head.php';

	$mysql_host = 'ksa18ky.synology.me:3307';
	$mysql_user = 'ksa18ky';
	$mysql_password = 'Kywtbas2002!';
	$mysql_db = 'altruistic';

	$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

	$id = $_SESSION[ 'user_id' ];
	$name = $_SESSION[ 'username' ];
	$key_value = $_GET[ 'key_value' ];


	// Attempt insert query execution

	$sql2 = "UPDATE altruistic_success SET buy_id = '$id', buy_name = '$name', state = 1 WHERE altruistic_id = '$key_value'";

	$result2 = mysqli_query($conn,$sql2);


	$sell_id = '';
	$sell_name = '';
	$sell_class = 0;
	$buy_id = '';
	$buy_name = '';
	$buy_class = 0;
	$subject_name = '';
	$match_time = '';
	$altruistic_id = 0;
	$state = 0;
	$trade_cycle = 0;


	$sql = "SELECT * FROM altruistic_success WHERE altruistic_id = '$key_value'";
	$result = mysqli_query($conn,$sql);

	while ($jb_row = mysqli_fetch_array( $result ) ) {
		$sell_id = $jb_row['sell_id'];
		$sell_name = $jb_row['sell_name'];
		$sell_class = $jb_row['sell_class'];
		$buy_id = $jb_row['buy_id'];
		$buy_name = $jb_row['buy_name'];
		$buy_class = $jb_row['buy_class'];
		$subject_name = $jb_row['subject_name'];
		$match_time = $jb_row['match_time'];
		$altruistic_id = $jb_row['altruistic_id'];
		$state = 0;
		$trade_cycle = $jb_row['trade_cycle'];
	}

	// Close connection
	mysqli_close($conn);

?>

<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>나너 해 (Altruistic)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src = "https://developers.kakao.com/sdk/js/kakao.min.js"></script>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
			<p id = "top">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><img src="logo.png" width = "100" height = "100" alt="" /></a>
									<section id="search" class="alt">
										<form action="search.php" method="get" >
											<input type="text" name="keyword" id="keyword" placeholder="과목명으로 검색하기" />
										</form>
									</section>
								</header>

								<section>
									<header class="main">
										<h1>트레이드 신청</h1>
										<h2>카카오톡 메시지 전송 + 대기열 신청 (자동)</h2>
									</header>

									<a href="javascript:;" id="kakao-link-btn"> 
									<!-- 버튼이 생기는 부분, id는 맘대로 쓰시되 아래 js 코드도 동일하게 적용해주셔야 합니다. -->
									<img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png" /> <!-- 톡 이미지 부분이고, 전 kakaolink_btn_small.png로 불러왔습니다.   -->
									</a>

									<script type="text/javascript">
										var key_value = '<? echo $key_value?>';
										var subject_name = '<? echo $subject_name?>';
										var sell_class = '<? echo $sell_class?>';
										var buy_class = '<? echo $buy_class?>';
									  //<![CDATA[
										// // 사용할 앱의 JavaScript 키를 설정해 주세요.
										Kakao.init('6a5c044070fcdc2ca4f4cc425b63d86e');
										// // 카카오링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
										Kakao.Link.createDefaultButton({
										  container: '#kakao-link-btn',  // 컨테이너는 아까 위에 버튼이 쓰여진 부분 id 
										  objectType: 'feed',
										  content: {  // 여기부터 실제 내용이 들어갑니다. 
											title: '[' + subject_name + '] ' + sell_class + '분반 ↔ ' + buy_class + '분반 | 트레이드 신청', // 본문 제목
											imageUrl: 'http://ksa18ky.synology.me/altruistic/ksa.jpg', // 이미지
											link: {
											  mobileWebUrl: 'http://ksa18ky.synology.me/altruistic/index.php',
											  webUrl: 'http://ksa18ky.synology.me/altruistic/index.php'
											}
										  },
										  buttons: [
											{
											  title: '수락',
											  link: {
												mobileWebUrl: 'http://ksa18ky.synology.me/altruistic/trade_success.php?key_value=' + key_value,
												webUrl: 'http://ksa18ky.synology.me/altruistic/trade_success.php?key_value=' + key_value
											  }
											},
											{
											  title: '거부',
											  link: {
												mobileWebUrl: 'http://ksa18ky.synology.me/altruistic/trade_deny.php?key_value=' + key_value,
												webUrl: 'http://ksa18ky.synology.me/altruistic/trade_deny.php?key_value=' + key_value
											  }
											}
										  ]
										});
										//location.href = "http://ksa18ky.synology.me/altruistic/altruistic.php"
									  //]]>
									</script> 
									
									<h3></h3>
									<a href="altruistic.php">나너 해 돌아가기</a>


								</section>
							

						</div>
					</div>

				<!-- Sidebar -->
<div id="sidebar">
						<div class="inner">
							<section>
								<?php
									if ( $jb_login ) { echo '<h3>'.$_SESSION[ 'user_id' ].' '.$_SESSION[ 'username' ].'님 안녕하세요</h3>';
									?>
									<nav id="menu">
										<header class="major">
											<h2>My Page</h2>
										</header>
										<h3><a href = "logout.php">로그아웃</a></h3>
										<ul>
											<li><a href="add.php">트레이드 추가하기</a></li>
											<li><a href="edit.php">나의 트레이드 관리하기</a></li>
										</ul>
									</nav>
									<?
										}
									else {?>
											<h3><a href = "login.php">카카오계정으로 로그인</a></h3>
										<?
									}
								 ?>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.php">Homepage</a></li>
										<li><a href="altruistic.php">트레이드 현황 및 신청</a></li>
										<li><a href="search.php">과목으로 검색하기</a></li>
										<li><a href="trade.php">트레이드 도우미</a></li>
									</ul>
								</nav>
							

									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>KAIST 부설 한국과학영재학교<br>
									18-006 고영<br>
									18-091 이설</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">ksa18ky@gmail.com</a></li>
										<li class="icon solid fa-phone">010-9984-1915</li>
										<li class="icon solid fa-home">47162 <br />
										부산광역시 부산진구 백양관문로 105-47<br />
										(당감동, 한국과학영재학교)</li>
									</ul>

								<footer id="footer">
									<p class="copyright">&copy; Young Ko. All rights reserved. <br />
									Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>