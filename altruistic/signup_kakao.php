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
		<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
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
									if ( !$jb_login ) {
									?>
								<section>
									<header class="main">
										<h1>회원가입</h1>
									</header>
									<h2>주의사항</h2>
									<h3>카카오톡을 함께 이용할 경우 아래 사항을 꼭 지켜주세요</h3>
									<p><strong>(1) 학번, 이름을 카카오톡 입력 정보와 정확히 일치하게 적어주세요.</strong><br>
									(2) 비밀번호는 평소에 본인이 자주 사용하던 비밀번호, 주민등록번호 뒷자리 등등 절대로 사용하지 마세요.<br>
									(3) 비밀번호는 카카오톡과 전혀 무관합니다.</p>
									<form id="kakao_id_input" name="kakao_id_input" method="post" action="signup_result.php">
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<input type="text" name="user_id" id="user_id" placeholder="학번 (ex)18-000" required/>
											</div>
										</div>
										<h3></h3>
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<input type="text" name="username" id="username" placeholder="이름 (ex)홍길동" required/>
											</div>
										</div>
										<h3></h3>
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<input type="password" name="user_pw" id="user_pw" placeholder="비밀번호 (ex)123abc" required/>
											</div>
										</div>
										<h3></h3>
										
										<input type="hidden" name="kakao_id" id="kakao_id" value="">

										<a id="kakao-login-btn"></a>
										<script type="text/javascript">
										var test = '';
										  // input your appkey
										  Kakao.init('6a5c044070fcdc2ca4f4cc425b63d86e')
										  Kakao.Auth.createLoginButton({
											container: '#kakao-login-btn',
											success: function(authObj) {
											  Kakao.API.request({
												url: '/v2/user/me',
												success: function(res) {
													test = JSON.stringify(res.id)
														document.kakao_id_input.kakao_id.value = test;
														document.forms["kakao_id_input"].submit();
												  alert(test)
												},
												fail: function(error) {
												  alert(
													'login success, but failed to request user information: ' +
													  JSON.stringify(error)
												  )
												},
											  })
											},
											fail: function(err) {
											  alert('failed to login: ' + JSON.stringify(err))
											},
										  })
										</script>

									</form>
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