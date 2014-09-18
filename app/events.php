<?php

// User Login event
Event::listen('user.login', function($userId)
{
    Session::put('userId', $userId);
});

// User logout event
Event::listen('user.logout', function()
{
	Session::flush();
});

// 
Event::listen('triggerDB', function($connection){
	
	//Config::set('database.connections.mysql.database', $connection);
	
	//Config::set('database.connections.mysql.database', $connection['database']);
	//Config::set('database.connections.mysql.host', $connection['host']);
	//Config::set('database.connections.mysql.username', $connection['username']);
	//Config::set('database.connections.mysql.password', $connection['password']);
});