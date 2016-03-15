<!DOCTYPE html>
<html lang="en">
<head>

<!-- Javascript -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/jquery.backstretch.min.js"></script>
<script src="bootstrap/js/login.js"></script>


<script language="javascript">
  function valida_campos(){
    
    if (document.login_form.username.value == ""){
      alert("Digite o seu username.");
      login_form.Username.focus();
      return false;
    }
    if (document.login_form.password.value == ""){
      alert("Digite a sua senha.");
      login_form.password.focus();
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
      </div>
      <div class="modal-body">
          <form name ="login_form" class="form col-md-12 center-block">
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