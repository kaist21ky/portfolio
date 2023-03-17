<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
  
  <title>Login Demo - Kakao JavaScript SDK</title>
  <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
 </head>
 
 <body>
  <a id="kakao-login-btn"></a>
  <a href="http://developers.kakao.com/logout"></a>
  

<script type="text/javascript">
  // input your appkey
  Kakao.init('6a5c044070fcdc2ca4f4cc425b63d86e')
  Kakao.Auth.createLoginButton({
    container: '#kakao-login-btn',
    success: function(authObj) {
      Kakao.API.request({
        url: '/v2/user/me',
        success: function(res) {
          alert(JSON.stringify(res))
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


  <button class="api-btn" onclick="kakaoLogout()">로그아웃</button>

	<script type="text/javascript">
	  // input your appkey
	  Kakao.init('6a5c044070fcdc2ca4f4cc425b63d86e')
	  function kakaoLogout() {
		if (!Kakao.Auth.getAccessToken()) {
		  alert('Not logged in.')
		  return
		}
		Kakao.Auth.logout(function() {
		  alert('logout ok\naccess token -> ' + Kakao.Auth.getAccessToken())
		})
	  }
	</script>

	<button class="api-btn" onclick="kakaoUser()">로그아웃</button>

	<script type="text/javascript">
	  // input your appkey
	  Kakao.init('6a5c044070fcdc2ca4f4cc425b63d86e')
	  function kakaoUser() {
		Kakao.API.request({
			url: '/v1/user/update_profile',
			data: {
				properties: {
					nickname: '홍길동',
					age: '22',
				},
			},
			success: function(response) {
				console.log(response);
			},
			fail: function(error) {
				console.log(error);
			}
		});
	  }
	</script>
 </body>
</html>