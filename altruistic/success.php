<?php 
  include 'inc_head.php';
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
									if ( $jb_login ) {
									?>
								<section>
									<header class="main">
										<h1>나너 해 현황</h1>
									</header>
									<h3><a href="add.php">나너 해 추가하기</a></h3>
									<h3><a href="edit.php">나의 나너 해 관리하기</a></h3>

									<table class="alt">
										<thead>
											<tr>
												<th>학번</th>
												<th>이름</th>
												<th>과목명</th>
												<th>나</th>
												<th>너</th>
											</tr>
										</thead>

										<tbody>

									<?php

										$num = $_POST[ 'num' ];
										$id = $_SESSION['user_id'];

										$selected_s_name = '';
										$selected_me = 0;
										$selected_you = 0;

										$mysql_host = 'ksa18ky.synology.me:3307';
										$mysql_user = 'ksa18ky';
										$mysql_password = 'Kywtbas2002!';
										$mysql_db = 'altruistic';

										$count = 1;

										$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

										if($conn === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
										 
										// Attempt insert query execution
										$sql = "SELECT * FROM altruistic WHERE id = '$id' AND success = 0";

										$result = mysqli_query($conn,$sql);

										while( $jb_row = mysqli_fetch_array( $result ) ) {
											if($count == $num){
												$selected_s_name = $jb_row['s_name'];
												$selected_me = $jb_row['me'];
												$selected_you = $jb_row['you'];
												echo $selected_s_name;
												$count++;
											} else {
												$count++;
											}
										}

										$sql2 = "UPDATE altruistic SET success = 1 WHERE id = '$id' AND s_name = '$selected_s_name' AND me = '$selected_me' AND you = '$selected_you'";

										$result2 = mysqli_query($conn,$sql2);

										if($result){
											echo "성공적으로 수정 되었습니다";
										} else {
											echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
										}
									 
										// Close connection
										mysqli_close($conn);
										echo("<script>location.replace('edit.php');</script>");
									?>

										</tbody>
									</table>



								</section>

								<?
									}
									else {
										?>
											<h3></h3>
											<h3><a href = "login.php">로그인</a> or <a href = "sign_up.php">회원가입<a> 하고 오세요</h3>
										<?
									}
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