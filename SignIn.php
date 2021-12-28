
<!doctype html>  
<html>  
<head>  
<title>Login page</title>  

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>  
<body>  
<div class="signin-form">

<form action="" method="POST">  
<div class="form-header">
			<h2>Sign In</h2>
			<p>Login to Access Engineer Hotel</p>
</div>
<div class="form-group">
			<label>Username</label>
        	<input type="text" class="form-control" placeholder="someone@site.com" name="user" autocomplete="off" required="required">
        </div>
		<div class="form-group">
			<label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="pass" autocomplete="off" required="required">
        </div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" value="Login" name="submit">Sign in</button>
		</div>
</form>  
<?php  
if(isset($_POST["submit"]))
{  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) 
{  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    include './Ajax/Connection.php';
	$con = OpenCon(); 
	$dbusername = '';
	$dbpassword = '';
	$sql = "SELECT * FROM authenticateuser WHERE Email='".$user."' AND Password='".$pass."'";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) 
            {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
				$dbusername=$row['Email'];  
				$dbpassword=$row['Password']; 
              }
            } 
            else
            {
              echo "Wrong Authentication";
            }

    
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  
  
    /* Redirect browser */  
    header("Location: Root.php");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} 
else 
{  
    echo "All fields are required!";  
}  
  
?>  
</body>  
</html>