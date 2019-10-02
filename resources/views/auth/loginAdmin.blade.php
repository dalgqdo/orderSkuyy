
<head>
	<title>Login admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{URL::to('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::to('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::to('/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{URL::to('/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{URL::to('/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="{{URL::to('/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700')}}" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{URL::to('/assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
                <p class="lead">Login to your account</p>
                            </div>
                            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
                @endif
							<form class="form-auth-small" action="index.php">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" onclick="login()" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCPQWFSDUo2iUBuMp6NkGm5z-NLtaehouc",
    authDomain: "orderskuy.firebaseapp.com",
    databaseURL: "https://orderskuy.firebaseio.com",
    projectId: "orderskuy",
    storageBucket: "orderskuy.appspot.com",
    messagingSenderId: "933211654229",
    appId: "1:933211654229:web:8caee9894b66f8ee98ecdc"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


    function login(){
        var email = $('#email').val();
        var password = $('#password').val();
        firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            window.alert("Error : " + errorMessage);
        });
        firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            var uid = user.uid;
            return firebase.database().ref('/user/' + uid).once('value').then(function(snapshot) {
            var name = (snapshot.val() && snapshot.val().Name) || 'Anonymous';
            var status = (snapshot.val() && snapshot.val().status) || 'Anonymous';
            var uidUser = (snapshot.val() && snapshot.val().UID) || 'Anonymous';
            if(status == "admin"){
                $.ajax({
                    type:"post" ,
                    url:"{{URL('/login/proccess')}}",
                    data:{
                        _token: "{{csrf_token()}}",
                        name: name,
                        status: status,
                        uid: uidUser,
                    },
                    success:function(response) {
                        if(response == 1){
                        window.location.href = "{{URL('/admin')}}"
                        }
                    }
                    });
            }else{
                alert('You doesnt registered')
                firebase.auth().signOut();
            }
        });
        }
        });
    }
  </script>
</html>
