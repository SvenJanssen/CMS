<?php
class UsersTableSeeder extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    $adminGroup = \Sentry::createGroup(array(
        'name'        => 'admin',
        'permissions' => array(
            'admin' => 1,
            'customers' => 1,
        )
    ));

    $customerGroup = \Sentry::createGroup(array(
        'name'        => 'customer',
        'permissions' => array(
            'admin' => 0,
            'customers' => 1,
        )
    ));
   
    foreach (Customer::all() as $i => $customer){
      $user = Sentry::createUser(array(
        'email'     => $i == 0 ? 'info@wiwi.nl' : $faker->email,
        'password'  => $i == 0 ? 'jordi697' : 'test',
        'activated' => true,
		'customer_id' => $customer->id
        ));

      $user->addGroup($i == 0 ? $adminGroup : $customerGroup);
    }
  }
}