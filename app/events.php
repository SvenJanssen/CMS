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