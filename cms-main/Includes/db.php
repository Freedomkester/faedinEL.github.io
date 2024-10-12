<?php

/* easy way to connect to a database we use the : mysqli_connect() 
function;
we pass the following parameters in order:
the server-> 'localhost';
the username-> 'root';
the password (in this case is empty) '';
the name of the databse -> CMS;*/

// easy way to connect to our database;
// $db_connection = mysqli_connect('localhost','root','','cms');

// more ideal way to connect to our database is by making our parameters constant
define("DB_HOST",'localhost');
define("DB_USER",'root');
define("DB_PASSWORD","");
//note another way to declare a constant is to use the const keyword;

const DB_NAME = "cms";

// connecting to the database with the constant parameters;
try{$db_connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);}
catch(mysqli_sql_exception){die("Query Failed: Turn on Server!");}

