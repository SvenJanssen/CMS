<?php

class WebsitesTableSeeder extends DatabaseSeeder {

	public function run()
	{
		$faker = $this->getFaker();
		Eloquent::unguard();
		
		foreach(Customer::all() as $i=>$customer)
		{
			Website::create([
				'customer_id'	=> $customer->id,
				'name' 			=> $faker->word,
				'url' 			=> $faker->url
			]);
		}
	}

}
