<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('CategoryTableSeeder');
	}

}

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$user = new \App\User();
		$user->name = 'Vedovelli';
		$user->email = 'vedovelli@gmail.com';
		$user->password = bcrypt(123456);
		$user->save();
	}
}

class CategoryTableSeeder extends Seeder
{
	public function run()
	{
		$i=0;
		while($i < 15)
		{
			$c = new \App\Category();
			$c->name = $i.'nome da categoria';
			$c->save();
			$i++;
		}
	}
}



