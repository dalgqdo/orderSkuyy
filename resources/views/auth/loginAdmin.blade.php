<html lang="en" class="fullscreen-bg">

<head>
	<title>Login admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>
<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>

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
							<form class="form-auth-small" action="index.php">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="signin-email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" placeholder="Password">
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
        var email = $("#signin-email").val();
        var password = $("#signin-password").val();
    firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Akun tidak terdaftar!'
        })
});
}

firebase.auth().onAuthStateChanged(function(user) {    
  if (user) {
    var user = firebase.auth().currentUser;
    firebase.database().ref('dataUser/' + user.uid).once('value').then(function(snapshot) {
        var Nama = (snapshot.val() && snapshot.val().nama) || 'Anonymous';
        var Email = (snapshot.val() && snapshot.val().email) || 'Anonymous';
        var Status = (snapshot.val() && snapshot.val().status) || 'Anonymous';
        const Toast = Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'Sign in success',
            showConfirmButton: false,
            timer: 1500
        })
        if (Status == "admin") {            
            $.ajax({
                type: "get",
                url: "{{url('loginPost')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    email: email,
                    userId: user.uid,
                    password: password
                },
                processData: false,
                contentType: false,
                success: function (data) {
					if(data == 1){                        
                        window.location.href = "{{url('login')}}";
                    }else{  
                        firebase.auth().signOut();                                             
                 	}
                }
            });            
        }else{
            firebase.auth().signOut();                     
        }
    })
  } else {
    Swal.fire({
    type: 'error',
    title: 'Oops...',
    text: 'Anda belum login!'
    })
  }
});
  </script>
</html>
