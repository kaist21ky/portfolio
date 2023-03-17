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
		Kakao.Link.createCustomButton({
		  container: '#kakao-link-btn',  // 컨테이너는 아까 위에 버튼이 쓰여진 부분 id 
		  templateId: '30974',
		  templateArgs: {
			'title': '제목 영역입니다.',
			'description': '설명 영역입니다.'
		  }
		});
	  //]]>
	</script> 
</body>
</html>