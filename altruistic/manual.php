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
											<h1>나너 해 사용방법</h1>
											<h3><a href = "#1">로그인 및 회원가입</a> | <a href = "#2">트레이드 신청하기</a> | <a href = "#3">추가하기</a> | <a href = "#4">관리하기</a> | <a href = "#5">검색하기</a> | <a href = "#6">트레이드 도우미</a><h3>
										</header>
									</div>
								</section>


							<!-- 사용방법 -->
								<div class="content">
									<p id = "1">
									<h3>나너 해 웹사이트</h3>
									<p>나너 해 웹사이트에 접속하면 <strong>카카오계정으로 회원가입 및 로그인</strong>을 해주셔야 합니다.</p>
									<a><img src="1.png" width = 20% height = auto alt="" /></a>

									<p id = "2">
									<h3>트레이드 현황 및 신청</h3>
									<p>트레이드 현황표에는 현재 데이터베이스에 저장된 모든 정보가 표시됩니다.<br>
									신청자의 학번, 이름, 과목명과 함꼐 <strong>신청자의 현재 분반 (나)</strong>, <strong>신청자가 희망하는 분반 (너)</strong>를 표로 한 눈에 볼 수 있습니다.<br>
									본인이 트레이드를 하고자 하는 트레이드에서 <strong>신청 버튼을 누르시면</strong> 자동으로 트레이드 대기열에 추가되며, 상대방에 수락 및 거부를 대기하게 됩니다.<br>
									추가로 카카오톡으로 상대방에게 직접적인 알림과 동시에 수락, 거부 이벤트를 전송할 수 있습니다.</p>
									<a><img src="2.png" width = 40% height = auto alt="" /></a>

									<p id = "3">
									<h3>트레이드 추가하기</h3>
									<p>본인이 현재 트레이드 하길 원하는 <strong>과목명 / 현재 분반 / 희망하는 분반</strong>을 입력하시면 됩니다.<br>
									분반은 숫자만 입력해주시고, 현재 분반과 희망 분반은 서로 달라야 합니다.<br>
									선택 가능한 과목은 해당 학기의 <strong>공식적인 시간표 및 수강신청 현황</strong>을 기반으로 하였습니다.</p>
									<a><img src="3.png" width = 40% height = auto alt="" /></a>

									<p id = "4">
									<h3>나의 트레이드 관리하기</h3>
									<p>관리하기 페이지에서는 <strong>트레이드가 대기중</strong>이거나 <strong>취소 / 수락 및 제거</strong>하고 싶은 항목을 <b>단 한번의 클릭으로</b> 완료할 수 있습니다.<br>
									트레이드가 완료된 경우 아래에 별도로 표시되며, <strong>대기열에서 자동으로 제거</strong>됩니다.</p>
									<a><img src="4.png" width = 70% height = auto alt="" /></a>

									<p id = "5">
									<h3>과목으로 검색하기</h3>
									<p>나너 해는 원하는 과목별로 검색할 수 있습니다.<br></p>
									<a><img src="5.png" width = 70% height = auto alt="" /></a>

									<p id = "6">
									<h3>트레이드 도우미</h3>
									<p>나너 해는 트레이드 매칭을 도와드립니다.<br>
									현재 매칭되지 않은 트레이드 중, <strong>매칭이 가능한 경우의 수</strong>를 모두 출력해 줍니다.<br>
									<b>이를 통해 분반 트레이드에 큰 도움을 받을 수 있습니다.</b><br>
									2단 트레이드의 경우 현재 출력되고 있지만, n단 트레이드의 경우 DFS 알고리즘을 완성하였음에도 출력에 어려움을 겪어 우선 보류되었습니다.</p>
									<a><img src="6.png" width = 70% height = auto alt="" /></a>
									
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