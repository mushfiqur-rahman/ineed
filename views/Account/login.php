<h1>Login Public</h1>
<?php

$html->ErrorBlock(isset($_SESSION['message'])?$_SESSION['message']:"");

$usr = new users();

$eemail = "";
$epassword = "";

$html->FormBegin();
$html->Text("email", $usr->email, $eemail);
$html->Password("password", $epassword);
$html->Submit("btnLoginPublic", "Login");
$html->FormEnd();