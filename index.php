<?php
session_start();

$cn = mysqli_connect("localhost", "root", "", "dbineed37");


$admin = array("users", "usersactive", "usersblock", "usersverified", "country", "city", "comodity", "gender", "comodityimage", "comodityapproved", "comodityreject", "comoditypublish", "");

$publicLogin = array("message", "i_need_something");

include('includes/dal/base.php');
include('includes/dal/country.php');
include('includes/dal/city.php');
include('includes/dal/gender.php');
include('includes/dal/users.php');
include('includes/dal/location.php');
include('includes/dal/comodity.php');
include('includes/dal/comodityapproved.php');
include('includes/dal/comodityarchive.php');
include('includes/dal/comoditydiscussion.php');
include('includes/dal/comoditycondition.php');
include('includes/dal/comodityimage.php');
include('includes/dal/comoditylinks.php');
include('includes/dal/comodityprice.php');
include('includes/dal/comoditypublish.php');
include('includes/dal/comodityreject.php');
include('includes/dal/comoditysold.php');
include('includes/dal/comodityvideo.php');
include('includes/dal/priority.php');
include('includes/dal/usersblock.php');
include('includes/dal/usersactive.php');
include('includes/dal/usersrating.php');
include('includes/dal/usersverified.php');
include('includes/dal/loginhistory.php');
include('includes/dal/messages.php');

include('includes/htmlHelper.php');
$html = new htmlHelper();

$controller = "home";
$view = "index";

$layout = "publicLayout";

if(isset($_GET['controller']))
{
	$controller = $_GET['controller'];
}

if(in_array($controller, $admin))
{
	$layout = "adminLayout";
}

if(isset($_GET['view']))
{
	$view = $_GET['view'];
}


if(isset($_POST['btnLogin']))
{
	$usr = new users();
	$usr->fillData();
	if($usr->Login())
	{
		if($usr->type == "A")
		{
			$_SESSION['id'] = $usr->id;
			$_SESSION['name'] = $usr->name;
			$_SESSION['type'] = $usr->type;
			if($view=="login")
			$view = "loginSuccess";
		}
		else{
			$_SESSION['message'] ='Invalid Login, Not an Admin Account';
		}
	}
	else{
		$_SESSION['message'] ='Invalid Login';
	}
}

if(isset($_POST['btnLoginPublic']))
{
	$usr = new users();
	$usr->fillData();
	if($usr->Login())
	{
			$_SESSION['id'] = $usr->id;
			$_SESSION['name'] = $usr->name;
			$_SESSION['type'] = $usr->type;
			if($view=="login")
			$view = "loginSuccess";
	}
	else{
		$_SESSION['message'] ='Invalid Login';
	}
}

if($view == "logout")
{
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['type']);
}


include('views/layouts/'.$layout.'.php');

function pageTitle()
{
	global $controller, $view;
	print '<span class="pageTitle"><b>'.ucwords(str_replace("_", " ", $controller)).'</b> | <i>'.ucwords(str_replace("_", " ", $view)).'</i></span>';
}

function Title()
{
	global $controller, $view;
	print ucwords(str_replace("_", " ", $controller)).', '.ucwords(str_replace("_", " ", $view));
}


function renderBody()
{
	global $controller, $view, $layout, $html, $cn, $admin, $publicLogin;
	
	pageTitle();
	
	if(in_array($controller, $admin))
	{
		if(!isset($_SESSION['type']))
		{
			$_SESSION['message'] = "You have to login to view this content";
			$controller = "MyAccount";
			$view = "Login";
		}
		else if($_SESSION['type'] != "A")
		{
			$_SESSION['message'] = "You have to login with admin account to view this content";
			$controller = "MyAccount";
			$view = "Login";
		}
	}
	else if(in_array($view, $publicLogin))
	{
		if(!isset($_SESSION['type']))
		{
			$_SESSION['message'] = "You have to login to view this content";
			$controller = "account";
			$view = "login";
		}
	}
	
	$fp = 'views/'.$controller.'/'.$view;
	
	if(file_exists($fp.'.php'))
	{
		include($fp.'.php');
	}
	else if(file_exists($fp.'.html'))
	{
		include($fp.'.html');
	}
	else{
		include('views/warning.php');
	}
	$_SESSION['message'] = "";
}


