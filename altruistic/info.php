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


							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>나너 해 TMI</h1>
											<h2>166,125 words | 8,029 lines | 53 files</h2>
											<p>
										</header>
										
									</div>
								</section>


							<!-- 사용방법 -->
								<div class="content">
									
									<h2>"나너 해"가 무엇인가요?</h2>
									<p>매 학기 시간표가 공개된 이후, 단톡방에서 서로 원하는 분반을 찾으며 발생하는 <strong>대혼란</strong>으로부터 자유로워지기 위해 시간표를 공사하다가 영혼을 잃어버린 개발자가 직접 만들었습니다.</p>
									<p>"(과목명) 나0 너0 구해요" 등의 카톡을 주고 받는 것에서 착안하여, 마마무의 노래 [Egotistic(너나 해)] 를 뒤집어서 만든 이름입니다.<br>
									"Altruistic"이라는 단어는 <strong>'이타적인'</strong>이라는 뜻을 가지고 있습니다.<br>
									우리 모두 서로 시간표 짜느라 고생하는 친구들을 위해 최대한 배려하도록 합시다.</p>

									<h3>DS 프로젝트 최종 발표</h3>
									<a href="ds_poster.pdf"><img src="ds_final_poster.png" alt="" /></a>
									
								</div>
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