<?php
	//// THIS FILE WILL CREATE THE REQUIRED DATABASE AND TABLES
	$username="root";                     /////////////////////// whatever the phpmyadmin username would be ////////////////////
	$password="";                         /////////////////////// whatever the phpmyadmin password would be ////////////////////
	$server="localhost";                  /////////////////////// whatever the server addresd would be      ////////////////////	
	$con=mysqli_connect($server,$username,$password);
	if($con){
		$q="CREATE DATABASE  `todo`";
		$r=mysqli_query($con,$q);
		$q="USE todo";
		$r=mysqli_query($con,$q);
		$q= "create table `todo`.`task`(
			`Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
			`Content` TEXT NOT NULL,
			`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY 
			 
		)";	
		$r=mysqli_query($con,$q);
		IF($r){
			echo 'you have created the required database successfully';
		}
		else{
			echo 'databse already created';
		}
	}
	else {
		echo 'some error occured in creating database , please check the host address , username , password ';
	}
?>