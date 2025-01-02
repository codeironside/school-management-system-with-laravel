<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
   $user = User::factory()->create([
    
            'name'=>'John doe',
            'email'=>'john@gmail.com'
        ]);
        listing::factory(count: 10)->create(["user_id"=>$user->id]); 
        // listing::create(attributes:[
        //     'title' => 'Software Engineer',
        //     'tags' => 'Software Engineer, Engineer',
        //     'companyname' => 'Google',
        //     'location' => 'Mountain View, CA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.google.com',
        //     'description' => 'Google is hiring a software engineer',
        // ]);
        // listing::create(attributes:[
        //     'title' => 'Software Engineer',
        //     'tags' => 'Software Engineer, Engineer',
        //     'companyname' => 'Google',
        //     'location' => 'Mountain View, CA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.google.com',
        //     'description' => 'Google is hiring a software engineer',
        // ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
