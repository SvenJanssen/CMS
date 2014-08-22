<?php

/*
	$name  = ucwords($faker->word);
    $stock = $faker->randomNumber(0, 100);
    $price = $faker->randomFloat(2, 5, 100);

*/

class DatabaseSeeder extends Seeder
{
	protected $faker;
	
  	public function getFaker()
	{

	  if (empty($this->faker))
	  {
	    $faker = Faker\Factory::create();
	    $faker->addProvider(new Faker\Provider\Base($faker));
	    $faker->addProvider(new Faker\Provider\Lorem($faker));
	    $faker->addProvider(new Faker\Provider\DateTime($faker));
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\en_US\Address($faker));
		$faker->addProvider(new Faker\Provider\Internet($faker));
	  }
	  return $this->faker = $faker;
	}

  public function run()
  {

  }

}