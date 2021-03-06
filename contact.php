<?php 
$your_email ='nanthana.thanonklin@sjsu.edu';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
  
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $user_message = $_POST['message'];
  ///------------Do Validations-------------
  if(empty($name)||empty($visitor_email))
  {
    $errors .= "\n Name and Email are required fields. "; 
  }
  if(IsInjected($visitor_email))
  {
    $errors .= "\n Bad email value!";
  }
  if(empty($_SESSION['6_letters_code'] ) ||
    strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
  {
  //Note: the captcha code is compared case insensitively.
  //if you want case sensitive match, update the check above to
  // strcmp()
    $errors .= "\n The captcha code does not match!";
  }
  
  if(empty($errors))
  {
    //send the email
    $to = $your_email;
    $subject="New form submission";
    $from = $your_email;
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    
    $body = "A user  $name submitted the contact form:\n".
    "Name: $name\n".
    "Email: $visitor_email \n".
    "Message: \n ".
    "$user_message\n".
    "IP: $ip\n";  
    
    $headers = "From: $from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";
    
    mail($to, $subject, $body,$headers);
    
    echo '<script language="javascript">';
      echo 'alert("Thanks for the submission!")';
      echo '</script>';
  }
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>



<!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" type="image/png" href="images/favicon_2016.png"/>

      <title>ETES - Contact Us</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

      <link href="css/style.css" rel="stylesheet">
      <!-- define some style elements-->
      <style>
        label,a, body 
        {
          font-family : Arial, Helvetica, sans-serif;
          font-size : 14px; 
          color:white;

        }
        .err
        {
          font-family : Verdana, Helvetica, sans-serif;
          font-size : 14px;
          color: red;
        }
      </style>  
      <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>  
    </head>

    <script>
      function getParameterByName(name, url) {
          if (!url) {
            url = window.location.href;
          }
          name = name.replace(/[\[\]]/g, "\\$&");
          var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
              results = regex.exec(url);
          if (!results) return null;
          if (!results[2]) return '';
          return decodeURIComponent(results[2].replace(/\+/g, " "));
      }
      function goHome(){
          var us_id = "index.html";
          if (getParameterByName('user_id'))
          {
            us_id = 'index.html?user_id=' + getParameterByName('user_id');
          }
            window.location = us_id;
      }
      
      function goBuy(){
            var us_id = 'ShoppingCart/index.php';
            if (getParameterByName('user_id'))
            {
              us_id = 'ShoppingCart/index.php?user_id=' + getParameterByName('user_id');
            }
              window.location = us_id;
      }
          function goDash()
    {
        var us_dashboard = "sign_up/signup.html";
        if (getParameterByName('user_id'))
    	{
    		us_dashboard = 'userdashboard.html?user_id=' + getParameterByName('user_id');
        }
        window.location = us_dashboard;
    }
    function signedIn()
    {
        var foo = "";
        if (getParameterByName('user_id'))
    	{
            foo += "<a onclick='goBuy()'>Buy Tickets</a> <a onclick='goDash()'>Dashboard</a> <a onclick='goHome()'>Home</a> </div>"
        }
        else
            {
                foo += "<a onclick='goBuy()''>Buy Tickets</a> <a onclick='goDash()'>Sign In</a> <a onclick='goHome()'>Home</a> </div>"
            }
        document.getElementById("myTopnav").innerHTML = foo;
    }
    </script>

    <body class="three-blocks" onload="signedIn()">
<div class="topnav" id="myTopnav">
<!--   <a href="contact.php">Contact Us</a> -->
  <a href="sign_up/signup.html">Sign In</a>
<!--     <a href="ShoppingCart/index.php">Buy Tickets</a> -->
    <a onclick="goBuy()">Buy Tickets</a>
    <!-- <a href="index.html">Home</a> -->
    <a onclick="goHome()">Home</a>
</div>

      <div class="text-center">
        <div class="container" id="buy">
          <div class="row">


            <div class="col-md-12">
                     <?php
        if(!empty($errors)){
        echo "<p class='err'>".nl2br($errors)."</p>";
        }
        ?>
        <div id='contact_form_errorloc' class='err'></div>
          <form method="POST" name="contact_form" 
          action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
            <p>
            <label for='name'>Name: </label>
            <input type="text" name="name" value='<?php echo htmlentities($name) ?>'>
            </p>
            <p>
            <label for='email'>Email: </label>
            <input type="text" name="email" value='<?php echo htmlentities($visitor_email) ?>'>
            </p>
            <p>
            <label for='message'>Message:</label> <br>
            <textarea name="message" rows=8 cols=30><?php echo htmlentities($user_message) ?></textarea>
            </p>
            <p>
            <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
            <label for='message'>Enter the code above here :</label><br>
            <input id="6_letters_code" name="6_letters_code" type="text"><br>
            <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
            </p>
            <input type="submit" value="Submit" name='submit'>
          </form>
        <script language="JavaScript">
          // Code for validating the form
          // Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
          // for details
          var frmvalidator  = new Validator("contact_form");
          //remove the following two lines if you like error message box popups
          frmvalidator.EnableOnPageErrorDisplaySingleBox();
          frmvalidator.EnableMsgsTogether();

          frmvalidator.addValidation("name","req","Please provide your name"); 
          frmvalidator.addValidation("email","req","Please provide your email"); 
          frmvalidator.addValidation("email","email","Please enter a valid email address"); 
          </script>
          <script language='JavaScript' type='text/javascript'>
          function refreshCaptcha()
          {
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
          }
        </script>



            </div>

          </div>

        </div>

      </div>
      <!--
      <footer>

        <p class="text-center">&copy;2017 Copyright ETES. All Rights Reserved.</p>
      </footer>

    -->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript">

        $('.carousel').carousel({
          interval: 3500, // in milliseconds
          pause: 'none' // set to 'true' to pause slider on mouse hover
        })
      </script>
      <script src="js/signup.js"></script>
    </body>
</html>

</html>
