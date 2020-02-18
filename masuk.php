<?php 

session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<title>RFM Scoring Fellas Production</title>
	<link rel="stylesheet" href="New folder/css/bootstrap.css">
    <link rel="stylesheet" href="New folder/css/style.css">
</head>
<body>


  
    <div class="jumbotron" style="margin : 0px";>
      
      <div class="col-md-6">
	  <br>
	  <br>
        <h1>  </h1>
        <p> </p>
      </div>

      <div class="col-md-6">
        <div class="wrapper">
<br>
<br>
            <form action="check_login.php" method="post" class="form-signin">       
            <h2 class="form-signin-heading text-center"> Log<b>in.</b> </h2>
   
			<tr><td>
              <div class="form-group">
                <input type="text" class="form-control2" name="username" placeholder="Username" autofocus />
              </div>

              <div class="form-group">
                <input type="password" class="form-control2" name="password" placeholder="Password" required/>  
              </div>    
        </td></tr>
       

              <?php if( isset($_SESSION["salah"]) ) : ?>
                <p style="color: white ; font-style: italic; font-size : 15px; padding-left : 0px;">username dan password salah! <br> kontak admin untuk info</p>
              <?php endif; ?>  
              
              <button class="btn btn-lg btn-danger btn-block" type="submit" name="login"><b> Masuk </b> </button> 
           
              
              <div class="row" >
						 <div class="col">
					
						 </div>
						</div>
			</form>
        </div>
      </div>
              


    </div>


	<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.js"></script>

</body>
</html>