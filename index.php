<!DOCTYPE html>
<html lang="en">
<head>

<!-- Javascript -->

<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery.backstretch.min.js"></script>
<script src="bootstrap/js/login.js"></script>




<script language="javascript">
  function valida_campos(){
    
    if (document.login_form.username.value == ""){

        $(".alert.alert-warning").html("<strong>Atenção!</strong> Digite o seu username.").stop().fadeIn("fast").delay(3000).fadeOut("fast");
        $("[name=username").focus();
        return false;
    }
    if (document.login_form.password.value == ""){
        $(".alert.alert-warning").html("<strong>Atenção!</strong> Digite a sua senha.").stop().fadeIn("fast").delay(3000).fadeOut("fast");
        $("[name=password").focus();
        return false;
    }
    return true;
  }
</script>

		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>pJarvis - Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/styles.css" rel="stylesheet">

</head>
<body>

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" onsubmit="return valida_campos(this);">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Project J Login</h1>
          <div class="alert alert-warning" style="display: none"></div>
      </div>
      <div class="modal-body">
          <form name ="login_form" class="form col-md-12 center-block" method="POST" action="login.php">
            <div class="form-group">
              <input type="text" name="username" class="form-control input-lg" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Login</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          Project Jarvis Ltda.
		  </div>	
      </div>
  </div>
  </div>
</div>
</body>
</html>