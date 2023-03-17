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
											<h1>나너 해</h1>
											<h3>수강신청 트레이드 도우미<h3>
										</header>
										<p>수강신청 트레이드 구할 때마다 <code>"자료구조 나1 너2 구해요 ㅠㅠ"</code> 쓰고, 찾기 귀찮으셨다면 <a href="altruistic.php">나너 해</a>를 사용해보세요</p>

										<?php
											if ( !$jb_login ) {?>
													<form id="kakao_login" name="kakao_login" method="post" action="login_result.php">
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
														document.kakao_login.kakao_id.value = test;
														document.forms["kakao_login"].submit();
												  alert('카카오 로그인 성공')
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
												<!--
												<form action="login.php">
													<input type="submit" value="로그인" class="primary" />
												<form action="sign_up.php">
													<input type="submit" value="회원가입" class="default" />-->
												<?
											}?>							
									</div>		<!--
									<div
									  id="kakao-talk-channel-add-button"
									  data-channel-public-id="_MfCxixb"
									  data-size="small"
									  data-support-multiple-densities="true"
									></div> -->
								</section>


							<!-- 사용방법 -->
								<div class="content">
									<ul class="actions">
										<li><a href="manual.php" class="button primary">사용자 매뉴얼</a></li>
										<li><a href="intro_video.php" class="button">나너 해 TMI</a></li>
									</ul>
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

			<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>

			<script>
			  window.kakaoAsyncInit = function() {
				Kakao.Channel.createAddChannelButton({
				  container: '#kakao-talk-channel-add-button',
				});
			  };

			  (function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = '//developers.kakao.com/sdk/js/kakao.plusfriend.min.js';
				fjs.parentNode.insertBefore(js, fjs);
			  })(document, 'script', 'kakao-js-sdk');
			</script>
	</body>
</html>