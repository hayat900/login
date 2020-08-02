<pre>
<?php
 session_start();
if ( isset($_POST['username'])  && isset($_POST['password'])){
    
      if(preg_match("/^[a-zA-Z]+$/",$_POST['username'])===0){
            $myobj=array("status"=>203,
                         "msg"=>"Failure:only characters allowed in username");
            $myJSON=json_encode($myobj,JSON_PRETTY_PRINT);
            $_SESSION["msg"]=$myJSON;
            header( 'Location: login.php' ) ;
            return;
            }
    else if(strlen($_POST['password'])<6){
           $myobj=array("status"=>201,
                        "msg"=>"Failure:password should be of length 6");
      
          $myJSON=json_encode($myobj,JSON_PRETTY_PRINT);
          $_SESSION["msg"]=$myJSON;
          header( 'Location: login.php' ) ;
          return;
    
          }
    else if(preg_match("/^[a-zA-Z]+$/",$_POST['password'])!==0){
          $myobj=array( "status"=>202,
                       "msg"=>"Failure:password to have 1 character and 1 number"
                      );
           $myJSON=json_encode($myobj,JSON_PRETTY_PRINT);
           $_SESSION["msg"]=$myJSON;
           header( 'Location: login.php' ) ;
           return;
   
          }
    else{
        $myobj=array("status"=>200,
                     "msg"=>"Success"
                     );
          $myJSON=json_encode($myobj,JSON_PRETTY_PRINT);
          $_SESSION["msg"]=$myJSON;
          header( 'Location: login.php' ) ;
          return;
      }
} 
?>
</pre>
<!doctype>
<html>
<head>
    <title>
    WELCOME TO LOGIN PAGE
    </title>
    
    <link rel="stylesheet" href="login.css">
</head>
<body>
   <?php
    if ( isset($_SESSION["msg"]) ) {
        echo('<h3 style="color:black">'.$_SESSION["msg"]."</h3>\n");
        unset($_SESSION["msg"]);
    }
   
   ?>
    <form class="form" method="post">
        <div class="form">
        <h1>LOGIN</h1>
        <P>Please fill this form to login to your an account</P>
        
        
            <label for="user" ><b>USERNAME:</b></label>
            <input type="text" placeholder="Enter username" name="username" >
            <br><br>
            <label for="pass"><b>PASSWORD:</b></label>
            <input type="password"placeholder="Enter password" name="password" required><br><br>
           
            <input type="submit" id="button1" value="LOGIN"><br>
       
       
       
        </div>
    </form>
        
</body>
</html>