<?php

class CustomersTableSeeder extends DatabaseSeeder {

	public function run()
	{
		$faker = $this->getFaker();
		Eloquent::unguard();
	
		foreach(range(1, 10) as $index)
		{
			Customer::create([
				'name' 			=> 	$faker->firstName,
				'surname' 		=> 	$faker->lastName,
				'banknumber'	=>	$faker->bothify('NL11INGB000#######'),
				'kvk'			=>	$faker->numerify('##########'),
				'btw'			=>	$faker->bothify('NL#########?##')
			]);
		}
	}
}