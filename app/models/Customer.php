<?php

class Customer extends \Eloquent {
	protected $fillable = [];
	
	public function users(){
		return $this->hasMany('User');
	}
	
	public function websites(){
		return $this->hasMany('Website');
	}
}