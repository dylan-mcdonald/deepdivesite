<?php
    //validate email
    function spamcheck($field)
    {
        //santize email
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        //validate email
        if ($field = filter_var($field, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //check against the spamcheck function
    $mailcheck = spamcheck($_POST["email"]);
    if($mailcheck == FALSE)
    {
        throw(new Exception("Invalid Email, please try again"));
    }
    $email = $_POST["email"];
    
    //sanitize the name field
    $nameRegexp = "/^[a-zA-Z\s\'\-]+$/";
    $name = $_POST["name"];
    if(preg_match($nameRegexp, $name) === 0)
    {
        throw(new Exception("Please use only letters, spaces, hyphens and apostrophes in the name field"));
    }
    
    //sanitize the phone field
    $phoneRegexp = "/^[\dextEXT\(\)\.\-\+\s]+$/";
    $phone = $_POST["phone"];
    if(preg_match($phoneRegexp, $phone) === 0)
    {
        throw(new Exception("Please use only digits, spaces, dashes, periods, parentheses, and extensions in the phone field"));
    }
    
    // Message
    $message = "$name has put their contact information in the website. Contact them at $email or $phone.";
    
    // From 
    $header ="from: $name <$mail_from>";
    
    // Send it to John
    $to ='josh@joshuatomasgarcia.com';
    $send_contact = mail($to,"Contact Form",$message,$header);
    
    // Check, if message sent to your email 
    // display message "We've recived your information"
    if($send_contact)
    {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Deep Dive Coders</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

<!-- NAVBAR
================================================== -->
  <body>
 <div class="navbar-wrapper">
      <div class="container"> 
        <a href=""><img src="images/logo.png" class="logo"></a>
          <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class=""><a href="index.html">Home</a></li>
                <li><a href="our_team.html">Our Team</a></li>
                <li><a href="the_program.html">The Program</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="active"><a href="/apply">Apply</a></li>
                
                
                <!--
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                
                -->
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <section class="container" style="margin-top: 100px">
        <?php echo "<h4 style='text-align: center'>We've recived your contact information</h4>";?>
    </section>
    <hr>
      <!-- FOOTER -->
      <footer class="footer container">
        <p class="pull-right">
          <strong>Contact:</strong><br/>
          Deep Dive Coders<br/>
          312 Central Ave SE<br/>
          Albuquerque, NM 87102<br/>
          (505) 720-1380<br/>
         <a href="mailto:hello@deepdivecoders.com">hello@deepdivecoders.com</a>
        </p>
        <p>
          &copy; 2013-2014 Deep Dive Coders LLC All Rights Reserved &middot;
          <a href="#">Carrers</a> &middot;
          <a href="#">Employers</a>  &middot;
          <a href="#">Our Network</a>  &middot;
          <a href="contact.html">Stay Informed</a>
        </p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
<?php
    }
    else {
    echo "ERROR";
    }
?>