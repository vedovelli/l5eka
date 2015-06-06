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
		// $this->call('CategoryTableSeeder');
		$this->call('ProjectTableSeeder');
	}

}

class ProjectTableSeeder extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create();

		\DB::table('projects')->truncate();

		$i=0;
		while($i < 15)
		{
			$p = new \App\Project();
			$p->name = $faker->text;
			$p->user_id = 1;
			$p->description = $faker->paragraph;
			$p->save();
			$i++;
		}
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



