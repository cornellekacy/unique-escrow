<?php 
session_start();
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; ?>

    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Login/Register</h2>
                     
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
                                                                          <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'admin/conn.php';

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['save'])){
 $email = mysqli_real_escape_string($link,$_POST['email']);
 $username = mysqli_real_escape_string($link,$_POST['username']);
 $password = mysqli_real_escape_string($link,$_POST['password']);


 if (empty($email)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong>Email Cannot Be Empty.
    </div>";
}

elseif (empty($username)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Username Cannot Be Empty.
    </div>";
}
elseif (empty($password)) {
    echo "<div class='alert alert-danger'>
    <strong>Failed!</strong> Password Cannot Be Empty.
    </div>";
}


else{
    $me = rand();
// Attempt insert query execution
    $sql = "INSERT INTO user (username,email,password) 
    VALUES ('$username','$email',MD5('$password'))";
    if(mysqli_query($link, $sql)){
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> User Account Successfully Created.
        </div>";



// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
 $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
      $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'tls';
$mail->Host = 'premium42.web-hosting.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "support@unique-escrow.com";
//Password to use for SMTP authentication
$mail->Password = "NFu)x4VQg9^m";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('support@unique-escrow.com', $_POST['username']);
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress($_POST['email'], 'Registration Mail');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
  if ($mail->addReplyTo($_POST['email'], $_POST['username'])) {
        $mail->Subject = 'Unique Escrow Inc';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
           $mail->AddEmbeddedImage('bar.png', 'logoimg', 'bar.png');
        $mail->AddEmbeddedImage('logo.png', 'logoimg1', 'logo.png');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
        $mail->Body = "
                 <img src=\"cid:logoimg1\" />
                    <h3><strong style='color: rgb(255,153,0);'>HELLO</strong> <strong style='text-transform: capitalize; color: rgb(255,153,0);'> $username, </strong> Welcome to Unique Escrow</h3>
                    <p> You Created an account on unique-escrow.com. This is your login details, Thanks For trusting us</p>
                    <br><br>
                    Username: $username<br>
                    Password: $password
                    <br><br>
                    login here
                    https://www.unique-escrow.com/authenticate.php
                    
                        ";
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            // echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            // window.location.href = 'mail.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}

//phpmailer ends here
    } else{
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
   
       echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Username already taken
        </div>";
    }
}
}
// Close connection
mysqli_close($link);

?>
                   <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4>Your Don't Have An Account? Register</h4>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label><b>Username</b></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="username" placeholder="Username" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label><b>Email</b></label>
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-30" name="email" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label><b>Password</b></label>
                                    <div class="form-group">
                                        <input type="password" class="form-control mb-30" name="password" placeholder="Password" required="">
                                    </div>
                                </div>
                            
                                <div class="col-12">
                                    <button name="save" type="submit" class="btn uza-btn btn-3 mt-15">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>  
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5">
                      <?php
//our included config file
include "admin/conn.php";
//starting our session to preserve our login


//check whether data with the session name username has already been created
//if so redirect to hhomepage
if (isset($_SESSION['username'])) {
    //redirecting if there is already a session with the name username
    // header("Location: home.php");
  echo '   <script> window.location = "admin/index.php";</script>';
   
}

//check whether data with the name username has been submitted
if (isset($_POST['save1'])) {

    //variables to hold our submitted data with post
    $username = $_POST['username'];
        //Encrypting our login password
    $password = md5($_POST['password']);

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);

    //our sql statement that we will execute
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

    //Executing the sql query with the connection
    $re = mysqli_query($link, $sql);

    //check to see if there is any record / row in the database
    //if there is then the user exists
    if (mysqli_num_rows($re)) {
        //echo "Welcome";
        //creating a session name with username ad inserting the submitted username
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        //redirecting to homepage
       echo '   <script> window.location = "admin/index.php";</script>';
    }else{
        //display error if no record exists
        echo "<div class='alert alert-danger' role='alert' align='center'>
  <strong>Oh snap!</strong> check Your Credentials.
</div>";
    }
}
?>
                     <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4>Fill The Form Bellow To Login</h4>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                     <label><b>Username</b></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="username" placeholder="Username" required="">
                                    </div>
                                </div>
                              
                               
                                <div class="col-12">
                                     <label><b>Password</b></label>
                                  <div class="form-group">
                                        <input type="password" class="form-control mb-30" name="password" placeholder="Password" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button name="save1" type="submit" class="btn uza-btn btn-3 mt-15">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
        </div>
    </div>
</div>
        <hr>
<?php include 'footer.php'; ?>