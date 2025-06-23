<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use App\Models\FacultyLeader;
use App\Models\HomeDescription;
use App\Models\HomeProduct;
use App\Models\HomeService;
use App\Models\Management;
use App\Models\User;
use App\Models\VisionMission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'user',
            'password' => Hash::make('password'),
        ]);

        HomeDescription::create([
            'title'       => 'Welcome to Lab Insyde',
            'description' => 'This is the description of Lab Insyde.',
        ]);

        HomeService::create([
            'title'       => 'Web Development',
            'description' => 'We provide modern web development services.',
            'icon'        => 'web.png',
        ]);

        HomeService::create([
            'title'       => 'SEO Optimization',
            'description' => 'Improve your website ranking on search engines.',
            'icon'        => 'seo.png',
        ]);

        HomeProduct::create([
            'name'        => 'Product A',
            'price'       => 99.99,
            'description' => 'Description of Product A.',
            'image'       => 'product_a.jpg',
        ]);

        HomeProduct::create([
            'name'        => 'Product B',
            'price'       => 49.99,
            'description' => 'Description of Product B.',
            'image'       => 'product_b.jpg',
        ]);

        Management::create([
            'name'        => 'John Doe',
            'position'    => 'Manager',
            'description' => 'Responsible for managing operations.',
            'nip'         => '123456789',
            'email'       => 'john@example.com',
            'image'       => 'john.jpg',
        ]);

        Management::create([
            'name'        => 'Jane Smith',
            'position'    => 'Assistant Manager',
            'description' => 'Assists in management duties.',
            'nip'         => '987654321',
            'email'       => 'jane@example.com',
            'image'       => 'jane.jpg',
        ]);

        AboutUs::create([
            'description' => 'Lab Insyde is dedicated to providing quality lab facilities for students.',
            'image'       => 'about_us.jpg',
        ]);

        FacultyLeader::create([
            'name'        => 'Dr. John Doe',
            'position'    => 'Dean',
            'description' => 'Experienced academic leader.',
            'nip'         => '111222333',
            'email'       => 'dean@example.com',
            'image'       => 'dean.jpg',
        ]);

        FacultyLeader::create([
            'name'        => 'Dr. Jane Smith',
            'position'    => 'Vice Dean',
            'description' => 'Leading academic research.',
            'nip'         => '444555666',
            'email'       => 'vice.dean@example.com',
            'image'       => 'vice_dean.jpg',
        ]);

        VisionMission::create([
            'vision'  => 'To be the leading lab in innovation and research.',
            'mission' => '1. Provide quality education. 2. Foster innovative research. 3. Build industry partnerships. 4. Enhance community engagement.',
        ]);
    }
}
