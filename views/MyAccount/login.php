<h1>Login</h1>
<?php

$html->ErrorBlock(isset($_SESSION['message'])?$_SESSION['message']:"");

$usr = new users();

$eemail = "";
$epassword = "";

$html->FormBegin();
$html->Text("email", $usr->email, $eemail);
$html->Password("password", $epassword);
$html->Submit("btnLogin", "Login");
$html->FormEnd();