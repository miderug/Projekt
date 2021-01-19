<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
http://localhost/projektPBSK/
-->
  <?php
 
        session_start();
         //session_destroy();
        if(isset($_SESSION['my_accessToken'])){
        $accessToken = $_SESSION['my_accessToken'];
        }else{
            $accessToken="";
        }
        // put your code here
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
      
        if($accessToken != ""){
 
        header('Location: http://localhost:81/projektPBSK/uzytkownik.php');
         exit;
            
           
           
        }else{
            echo '<p><a href="https://github.com/login/oauth/authorize?client_id=4f7b6b3be024989287c8">Zaloguj się przez GitHuba</a></p>';
        }
                   
        
        
        // put your code here
        ?>
    </body>
</html>
