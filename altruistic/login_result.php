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

									$is_empty = 0;

									$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

									$kakao_id = $_POST[ 'kakao_id' ];
									if($conn === false){
										die("ERROR: Could not connect. " . mysqli_connect_error());
									}
									 
									// Attempt insert query execution
									$sql = "SELECT * FROM user WHERE kakao_id = '$kakao_id'";

									$result = mysqli_query($conn,$sql);

									while( $row = mysqli_fetch_array( $result ) ) {
										$is_empty = 1;
										if($kakao_id == $row['kakao_id']){
											$_SESSION['user_id'] = $row['user_id'];
											$_SESSION['username'] = $row['username'];
											if(isset($_SESSION['user_id']))
											{
												echo("<script>location.replace('index.php');</script>");
											} else {
												echo "세션 저장 실패";
											}
										} else {
											echo "학번 혹은 비밀번호가 틀림";
										}
									}

									if ($is_empty == 0){?>
										<h2>나너 해 로그인 실패</h2>
										<h3>해당 카카오 아이디로 회원가입 하셨는지 확인해주십시오.</h3>
										<p><a href="sign_up.php">나너 해 회원가입</a><br>
										회원가입을 통해 학번과 이름을 등록해주십시오.</p>
										
									<?
									}
									 
									// Close connection
									mysqli_close($conn);
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