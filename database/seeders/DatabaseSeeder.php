<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'هدوة',
            'email' => 'Hedwa@skilmatch.ly',
             'role' => '1',
            'password' => bcrypt('12345678')
        ]);

          $user = User::factory()->create([
            'name' => 'شركة سكيل ماتش',
            'email' => 'skill@skilmatch.ly',
             'role' => '2',
            'password' => bcrypt('12345678')
        ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        Listing::create([
            'title' => 'مطور ويب',
            'tags' => 'laravel, javascript',
            'company' => 'Acme Corp',
            'location' => 'صبراته - ليبيا',
            'email' => 'email1@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        ]);

        Listing::create([
            'title' => 'مطور برمجيات',
            'tags' => 'laravel, backend ,api',
            'company' => 'Stark Industries',
            'location' => 'طرابلس - ليبيا',
            'email' => 'email2@email.com',
            'website' => 'https://www.starkindustries.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
          ]);
            Listing::create([
            'title' => 'مطور برمجيات',
            'tags' => 'laravel, backend ,api',
            'company' => 'Stark Industries',
            'location' => 'طرابلس - ليبيا',
            'email' => 'email2@email.com',
            'website' => 'https://www.starkindustries.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
          ]);

            listing::create([
            'title' => 'مساعد تقني',
            'tags' => 'laravel, backend ,api',
            'company' => 'Stark Industries',
            'location' => 'طرابلس - ليبيا',
             'email' => 'email2@email.com',
               'website' => 'https://www.starkindustries.com',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
          ]);



    }
}
