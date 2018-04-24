<?php

include('includes/dal/base.php');
include('includes/dal/country.php');
include('includes/dal/city.php');

$cnt = new country();
$cnt->id = 6;
$cnt->SelectById();


print $cnt->id.":".$cnt->name;

/*
$ct = new city();
$ct->id = 1;
$ct->SelectById();

*/