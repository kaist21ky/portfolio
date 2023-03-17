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
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css" rel="stylesheet" />
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
								<section>
									<header class="main">
										<h1>트레이드 추가하기</h1>
									</header>
									<script>
									function checkForm() {
										var me = document.a_input.me;
										var you = document.a_input.you;

										if(me.value == you.value){
											alert('희망 분반은 현재 분반과 다르게 입력해주세요');
											you.focus();
											return false;
										}
									}
									</script>

									<form id="a_input" name="a_input" method="post" action="altruistic_input.php" onsubmit="return checkForm();">
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<select class="js-example-basic-single" name="s_name">
													<option value="TOPIK한국어">TOPIK한국어</option>
													<option value="감염과면역">감염과면역</option>
													<option value="고급알고리즘">고급알고리즘</option>
													<option value="과학기술과사회">과학기술과사회</option>
													<option value="과학의역사와철학">과학의역사와철학</option>
													<option value="국어">국어</option>
													<option value="국어특강">국어특강</option>
													<option value="기초뇌과학">기초뇌과학</option>
													<option value="기초물리학(EC)">기초물리학(EC)</option>
													<option value="기초분석화학">기초분석화학</option>
													<option value="기초역학">기초역학</option>
													<option value="기초유기화학">기초유기화학</option>
													<option value="기초정수론">기초정수론</option>
													<option value="기초정수론(EC)">기초정수론(EC)</option>
													<option value="기초해석학">기초해석학</option>
													<option value="나노화학의입문">나노화학의입문</option>
													<option value="날씨와기후">날씨와기후</option>
													<option value="논리와글쓰기">논리와글쓰기</option>
													<option value="도시계획과환경">도시계획과환경</option>
													<option value="문학">문학</option>
													<option value="문학과사회">문학과사회</option>
													<option value="물리학및실험1">물리학및실험1</option>
													<option value="물리학및실험2">물리학및실험2</option>
													<option value="물리학세미나">물리학세미나</option>
													<option value="물리학특강(물리학의통합적문제해결기법)">물리학특강(물리학의통합적문제해결기법)</option>
													<option value="물리학특강(전자회로의이해와응용)">물리학특강(전자회로의이해와응용)</option>
													<option value="미분방정식">미분방정식</option>
													<option value="미술">미술</option>
													<option value="미적분학1">미적분학1</option>
													<option value="미적분학2">미적분학2</option>
													<option value="미적분학3">미적분학3</option>
													<option value="법과학">법과학</option>
													<option value="별과우주">별과우주</option>
													<option value="분광학입문">분광학입문</option>
													<option value="사회특강">사회특강</option>
													<option value="생명과학탐구">생명과학탐구</option>
													<option value="생물학및실험1">생물학및실험1</option>
													<option value="생물학및실험2">생물학및실험2</option>
													<option value="생물학세미나">생물학세미나</option>
													<option value="생물학특강(생화학)">생물학특강(생화학)</option>
													<option value="생활미술">생활미술</option>
													<option value="생활속의화학">생활속의화학</option>
													<option value="생활음악">생활음악</option>
													<option value="생활체육1">생활체육1</option>
													<option value="생활체육1">생활체육2</option>
													<option value="선형대수">선형대수</option>
													<option value="선형대수">선형대수(EC)</option>
													<option value="세계사의이해">세계사의이해</option>
													<option value="세포와질환">세포와질환</option>
													<option value="소통과화법">소통과화법</option>
													<option value="수학1">수학1</option>
													<option value="수학2">수학2</option>
													<option value="수학3">수학3</option>
													<option value="수학과예술">수학과예술</option>
													<option value="수학세미나">수학세미나</option>
													<option value="수학의활용">수학의활용</option>
													<option value="수학적모델링">수학적모델링</option>
													<option value="수학특강(논리및집합)">수학특강(논리및집합)</option>
													<option value="수학특강(현대수학의흐름)">수학특강(현대수학의흐름)</option>
													<option value="스페인언어와문화">스페인언어와문화</option>
													<option value="시사영어">시사영어</option>
													<option value="심화영어">심화영어</option>
													<option value="알고리즘">알고리즘</option>
													<option value="역사속의물리학">역사속의물리학</option>
													<option value="영미문화의이해">영미문화의이해</option>
													<option value="영어1">영어1</option>
													<option value="영어2">영어2</option>
													<option value="영어독해와작문">영어독해와작문</option>
													<option value="영어청해와회화">영어청해와회화</option>
													<option value="영어특강">영어특강</option>
													<option value="예술속의물리">예술속의물리</option>
													<option value="우주과학및실습">우주과학및실습</option>
													<option value="우주생물학">우주생물학</option>
													<option value="유전자의이해">유전자의이해</option>
													<option value="음악">음악</option>
													<option value="이산구조">이산구조</option>
													<option value="인간생물학">인간생물학</option>
													<option value="일반물리학1">일반물리학1</option>
													<option value="일반물리학2">일반물리학2</option>
													<option value="일반물리학1(EC)">일반물리학1(EC)</option>
													<option value="일반물리학2(EC)">일반물리학2(EC)</option>
													<option value="일반물리학실험1">일반물리학실험1</option>
													<option value="일반물리학실험2">일반물리학실험2</option>
													<option value="일반생물학1">일반생물학1</option>
													<option value="일반생물학2">일반생물학2</option>
													<option value="일반생물학실험">일반생물학실험</option>
													<option value="일반지구과학">일반지구과학</option>
													<option value="일반지구과학실험">일반지구과학실험</option>
													<option value="일반천문학">일반천문학</option>
													<option value="일반천문학실험">일반천문학실험</option>
													<option value="일반화학1">일반화학1</option>
													<option value="일반화학2">일반화학2</option>
													<option value="일반화학실험1">일반화학실험1</option>
													<option value="일반화학실험2">일반화학실험2</option>
													<option value="일본언어와문화">일본언어와문화</option>
													<option value="자료구조">자료구조</option>
													<option value="전기화학에너지시스템">전기화학에너지시스템</option>
													<option value="정보과학1">정보과학1</option>
													<option value="정보과학2">정보과학2</option>
													<option value="정보과학3">정보과학3</option>
													<option value="정보과학세미나">정보과학세미나</option>
													<option value="정보과학특강">정보과학특강</option>
													<option value="정치와경제">정치와경제</option>
													<option value="중국언어와문화">중국언어와문화</option>
													<option value="지구과학특강(Urbanism, Environment, and Infrastructure)">지구과학특강(Urbanism, Environment, and Infrastructure)</option>
													<option value="지구과학특강(해양학)">지구과학특강(해양학)</option>
													<option value="지구환경과학">지구환경과학</option>
													<option value="창의적문제해결기법">창의적문제해결기법</option>
													<option value="천체관측의기초">천체관측의기초</option>
													<option value="철학">철학</option>
													<option value="체육1">체육1</option>
													<option value="체육2">체육2</option>
													<option value="체육3">체육3</option>
													<option value="체육4">체육4</option>
													<option value="탐구물리">탐구물리</option>
													<option value="프로그래밍과문제해결">프로그래밍과문제해결</option>
													<option value="한국사의이해">한국사의이해</option>
													<option value="현대물리학개론">현대물리학개론</option>
													<option value="화학과에너지">화학과에너지</option>
													<option value="화학및실험1">화학및실험1</option>
													<option value="화학및실험2">화학및실험2</option>
													<option value="화학세미나">화학세미나</option>
													<option value="화학특강">화학특강</option>
													<option value="확률및통계">확률및통계</option>
												</select>
												<!--<input type="text" name="s_name" id="s_name" placeholder="과목명 (ex)미적분학1" required/>-->
											</div>
										</div>
										<h3></h3>
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<input type="text" name="me" id="me" placeholder="현재 분반 (ex)1" pattern="\d*" title="분반을 숫자만 입력해주세요." required/>
											</div>
										</div>
										<h3></h3>
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<input type="text" name="you" id="you" placeholder="희망 분반 (ex)2" pattern="\d*" title="분반을 숫자만 입력해주세요." required/>
											</div>
										</div>
										<h3></h3>
										<input type="submit" value="추가하기" class="primary" />

										


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

			
			<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<!-- select2 javascript cdn -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"></script>

			<script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2({
				  placeholder: "Select an option",
				  allowClear: false
				});
			});
			</script>

	</body>
</html>