<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['slug' => 'programming-coding', 'name' => 'Programming & Coding'],
            ['slug' => 'mobile-development', 'name' => 'Mobile Development'],
            ['slug' => 'web-development', 'name' => 'Web Development'],
            ['slug' => 'data-science-machine-learning', 'name' => 'Data Science & Machine Learning'],
            ['slug' => 'cloud-computing', 'name' => 'Cloud Computing'],
            ['slug' => 'hardware-gadgets', 'name' => 'Hardware & Gadgets'],
            ['slug' => 'game-development', 'name' => 'Game Development'],
            ['slug' => 'artificial-intelligence-robotics', 'name' => 'Artificial Intelligence & Robotics'],
            ['slug' => 'tech-news-trend', 'name' => 'Tech News & Trend'],
            ['slug' => 'project-showcase', 'name' => 'Project Showcase'],
            ['slug' => 'career-learning-resources', 'name' => 'Career & Learning Resources'],
        ]);
    }
}
