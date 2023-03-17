<?php 
  include 'inc_head.php';
?>

<html lang="ko">
  <head>
		<title>나너 해 (Altruistic)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
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

							<!-- Content -->
								<?php

									$mysql_host = 'ksa18ky.synology.me:3307';
									$mysql_user = 'ksa18ky';
									$mysql_password = 'Kywtbas2002!';
									$mysql_db = 'altruistic';

									$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

									$id = $_SESSION[ 'user_id' ];
									$name = $_SESSION[ 'username' ];
									$key_value = $_GET[ 'key_value' ];
									$success = 0;

									if($conn === false){
										die("ERROR: Could not connect. " . mysqli_connect_error());
									}
									 
									// Attempt insert query execution
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
									

									$sql2 = "UPDATE altruistic_success SET state = 3, denied = 1 WHERE altruistic_id = '$key_value'";
									$result2 = mysqli_query($conn,$sql2);

									$sql6 = "UPDATE altruistic success = 1 WHERE key_value = '$key_value'";
									$result6 = mysqli_query($conn,$sql6);

									$sql4 = "INSERT INTO altruistic ( id, name, s_name, me, you, success ) VALUES ( '$sell_id', '$sell_name', '$subject_name', '$sell_class', '$buy_class', '0' )";
									$result4 = mysqli_query($conn,$sql4);

									$sql5 = "SELECT * FROM altruistic WHERE id = '$sell_id' and name = '$sell_name' and s_name = '$subject_name' and me = '$sell_class' and you = '$buy_class' and success = 0";
									$result5 = mysqli_query($conn,$sql5);
									while ($jb_row5 = mysqli_fetch_array( $result5 ) ) {
										$altruistic_id = $jb_row5['key_value'];
									}

									$sql3 = "INSERT INTO altruistic_success ( sell_id, sell_name, sell_class, buy_id, buy_name, buy_class, subject_name, match_time, altruistic_id, state, trade_cycle, denied ) VALUES ( '$sell_id', '$sell_name', '$sell_class', '$buy_id', '$buy_name', '$buy_class', '$subject_name', '$match_time', '$altruistic_id', '$state', '$trade_cycle', 0 )";

									$result3 = mysqli_query($conn,$sql3);

									if($result){
										echo "성공적으로 업로드 되었습니다";
									} else{
										echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
									}
									 
									// Close connection
									mysqli_close($conn);
									echo("<script>location.replace('edit.php');</script>");
								?>

								



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