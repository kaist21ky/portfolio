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
									<a href="index.php" class="logo"><strong>나너 해</strong> Altruistic</a>
									<section id="search" class="alt">
										<form method="get" action="search.php">
											<input type="text" name="keyword" id="keyword" placeholder="과목명으로 검색하기" />
										</form>
									</section>
								</header>

							<!-- Content -->
								<?php
									/*if ( $jb_login ) {*/
									?>
								<section>
									<header class="main">
										<h1>나너 해 트레이드 도우미</h1>
									</header>
										
										<h3>2단 트레이드</h3>
										<form id="trade_result_output" name="trade_result_output" method="post" action="trade_result.php">
											<input type="hidden" name="trade_result" id="trade_result" value="">
										</form>

									<?php

										$keyword = $_GET[ 'keyword' ];

										$mysql_host = 'ksa18ky.synology.me:3307';
										$mysql_user = 'ksa18ky';
										$mysql_password = 'Kywtbas2002!';
										$mysql_db = 'altruistic';

										$count = 0;
										
										$s_id = array();
										$s_name_kor = array();

										$data = array(array());

										$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

										if($conn === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
										/*$sql2 = "SELECT * FROM subject";

										$result2 = mysqli_query($conn,$sql2);

										while( $jb_row2 = mysqli_fetch_array( $result2 ) ) {
											array_push($s_id, $jb_row2['s_id']);
											array_push($s_name_kor, $jb_row2['s_name_kor']);
										}*/
										// Attempt insert query execution
										$sql = "SELECT * FROM altruistic_success WHERE state = 0 and subject_name = '$keyword'";

										$result = mysqli_query($conn,$sql);
										$n = 0;
										$altruistic_data = array();
										$altruistic_final = array();

										while( $jb_row = mysqli_fetch_array( $result ) ) {;
											array_push($altruistic_data, $jb_row);
											array_push($altruistic_final, array($jb_row['altruistic_id'], array(array($jb_row['sell_class'], $jb_row['buy_class'])), false));
										}

										//$output =  json_encode($altruistic_final);
										//print_r ($altruistic_data);

										mysqli_close($conn);

										//print_r ($altruistic_final);
									?>

									<script>
									var test = <? echo json_encode($altruistic_final); ?>;
									//document.write(test)
									let sample = [
										[
											0,
											[
												[0, 1],
											],
											false
										],
										[
											1,
											[
												[1, 0],
												[1, 2],
											],
											false
										],
										[
											2,
											[
												[2, 0],
												[2, 1],
											],
											false
										],

									]

									let cycles = []


									function detectCycle(graph) {
										/*
											Grpah 는 아래 형식으로 되어있다고 가정
											graph = [
												[
													int id,
													[
														[int have, int want],
														[have, want],
														[have, want]
													],
													boolean visited
												],
												[
													id :
													...
												]
											]
										*/
										cycles = []
										while(true) {
											let start_node = graph.find(d => d[2] == false)
											if(start_node == undefined) {
												// 더이상 방문하지 않은 node가 없음
												break
											}
											else {
												let path = []    // 현위치까지 온 경로
												dfs(graph, path, start_node[0], undefined)
											}
										}
										console.log(cycles)
										return cycles
									}
									function dfs(graph, path, current, item) {
										//console.log(path, current)
										
										// Cycle 생성
										if(path.includes(current)) {
											// 완성 cycle
											let index = path.indexOf(current)
											cycles.push(path.slice(index))
										}
										else {
											// 현재 node
											let node = graph.find(d => d[0] == current)
											path.push(current)
											// 현재 node에서 건너갈 수 있는 node 체크하기
											let valid_trades = node[1]
											if(item != undefined) {
												valid_trades = valid_trades.filter(t => t[0] == item )
											}
											for (let [have, want] of valid_trades) {
												// 건너갈 수 있는 후보 node들
												// graph의 모든 node들 중 trade의 have에 현재 node의 want와
												// 같은 값을 가지고 있는 학생들의 고유번호들을 가져온다
												let candidates = graph.filter(n => 
													n[1].map(t => t[0]).includes(want))
												// filter를 통해 visited candidate를 걸러낸다
												candidates = candidates.filter(n => n[2] == false)
												// candidate마다 dfs 수행
												for(candidate of candidates) {
													//console.log(candidate['id'])
													dfs(graph, path, candidate[0], want)
												}
											}
											node[2] = true
										}
										
									}

									detectCycle(sample)

									var trade_result = detectCycle(test)
									var trade_num = trade_result.length
									
									//document.write(trade_result[0])
									//document.write('<br>')
									//document.write(trade_result[1])
									document.trade_result_output.trade_result.value = trade_result;
									document.forms["trade_result_output"].submit();
									</script>

									<?php
									/*
										//$trade_num = "<script>document.write (trade_num);</script>";
										//$int_trade_num = (int) ($trade_num);

										$trade_result = array();
										for($i = 0; $i < 100; $i += 1){
											array_push($trade_result, "<script>if (trade_result[$i]){
											document.write (trade_result[$i]);
										}</script>");
										}
										$trade_num = count($trade_result);
										
										
										$mysql_host = 'ksa18ky.synology.me:3307';
										$mysql_user = 'ksa18ky';
										$mysql_password = 'Kywtbas2002!';
										$mysql_db = 'altruistic';

										

										$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);


										$sql = "SELECT * FROM altruistic_success WHERE state = 0";

										$result = mysqli_query($conn,$sql);
										$altruistic_data2 = array();

										while( $jb_row = mysqli_fetch_array( $result ) ) {;
											array_push($altruistic_data2, $jb_row);
										}

										mysqli_close($conn);

										/*for($i = 0; $i < $trade_num; $i += 1){
											array_search($altruistic_data2[i]['altruistic_id']
											
										}*/

										//print_r ($altruistic_data2[0]['altruistic_id']);

										/*for($i = 0; $i < $trade_num; $i += 1){
												echo ($trade_result[$i]);
												echo ("<br>");
												//echo ($altruistic_data2[array_search('Orange', $fruits)]['altruistic_id']
												//echo ($altruistic_data2[0][0]);
												$i_trade_result = (string)($trade_result[$i]);
												$i_array_trade_result = explode(',', $i_trade_result);
												//print_r ($i_array_trade_result);
												echo ("<br>");
												echo ("<br>");
											
										}*/
									?>


								</section>
								

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<section>
								<?php
									if ( $jb_login ) { echo '<h3>'.$_SESSION[ 'username' ].'님 안녕하세요</h3>';
									?>
									<nav id="menu">
										<header class="major">
											<h2>My Page</h2>
										</header>
										<h3><a href = "logout.php">로그아웃</a></h3>
										<ul>
											<li><a href="add.php">나너 해 추가하기</a></li>
											<li><a href="edit.php">나의 나너 해 관리하기</a></li>
										</ul>
									</nav>
									<?
										}
									else {?>
											<h3><a href = "login.php">로그인</a> or <a href = "sign_up.php">회원가입<a></h3>
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
										<li><a href="altruistic.php">나너 해</a></li>
										<li><a href="search.php">검색하기</a></li>
										<li><a href="trade.php">트레이드 도우미</a></li>
									</ul>
								</nav>
							

									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>You can contact me through the contact information below. (Website developer)</p>
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