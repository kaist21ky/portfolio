<?php
	$a = "테스트";
?>


<html>
<head>
<title>Kakao demo</title>
<script src = "https://developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>
<body>
	<a href="javascript:;" id="kakao-link-btn"> 
	<!-- 버튼이 생기는 부분, id는 맘대로 쓰시되 아래 js 코드도 동일하게 적용해주셔야 합니다. -->
	<img src="//developers.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png" /> <!-- 톡 이미지 부분이고, 전 kakaolink_btn_small.png로 불러왔습니다.   -->
	</a>
	<script type="text/javascript">
		var test = '<? echo $a?>';
	  //<![CDATA[
		// // 사용할 앱의 JavaScript 키를 설정해 주세요.
		Kakao.init('6a5c044070fcdc2ca4f4cc425b63d86e');
		// // 카카오링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		Kakao.Link.createDefaultButton({
		  container: '#kakao-link-btn',  // 컨테이너는 아까 위에 버튼이 쓰여진 부분 id 
		  objectType: 'feed',
		  content: {  // 여기부터 실제 내용이 들어갑니다. 
			title: '나너 해 카카오링크 안녕', // 본문 제목
			description: '#나너 해 #자료구조 #KSA',  // 본문 바로 아래 들어가는 영역?
			imageUrl: 'http://ksa18ky.synology.me/altruistic/ksa.jpg', // 이미지
			link: {
			  mobileWebUrl: 'http://ksa18ky.synology.me/altruistic/index.php',
			  webUrl: 'http://ksa18ky.synology.me/altruistic/index.php'
			}
		  },
		  social: {  /* 공유하면 소셜 정보도 같이 줄 수 있는데, 이 부분은 기반 서비스마다 적용이 쉬울수도 어려울 수도 있을듯 합니다. 전 연구해보고 안되면 제거할 예정 (망할 google  blogger...) */
			likeCount: 286,
			commentCount: 45,
			sharedCount: 845
		  },
		  buttons: [
			{
			  title: '나너 해' + test + ' 보기',
			  link: {
				mobileWebUrl: 'http://ksa18ky.synology.me/altruistic/altruistic.php',
				webUrl: 'http://ksa18ky.synology.me/altruistic/altruistic.php'
			  }
			},
			{
			  title: '트레이드 도우미',
			  link: {
				mobileWebUrl: 'http://ksa18ky.synology.me/altruistic/trade.php',
				webUrl: 'http://ksa18ky.synology.me/altruistic/trade.php'
			  }
			}
		  ]
		});
	  //]]>
	</script> 
</body>
</html>