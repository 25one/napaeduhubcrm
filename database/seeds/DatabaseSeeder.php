<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Test;
use App\Models\Statuse;
use App\Models\Course;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Users
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('superstar'),
                'role' => 'admin',
                'remember_token' => str_random(10),
            ]
        ); 
        User::create(
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('moon'),
                'role' => 'user',               
                'remember_token' => str_random(10),
            ]
        );                  

        // Tests
        Test::create(
            [
                'name' => 'My way',
            ]
        ); 
        Test::create(
            [
                'name' => 'Person hunter',
            ]
        );

        // Statuses
        Statuse::create(
            [
                'name' => 'Consultation',
            ]
        ); 
        Statuse::create(
            [
                'name' => 'Contract',
            ]
        ); 
        Statuse::create(
            [
                'name' => 'Selling',
            ]
        );              

        // Courses
        Course::create(
            [
                'name' => 'Full-Stack IT-Development-EURO',
            ]
        ); 
        Course::create(
            [
                'name' => 'Full-Stack IT-Marketing-EURO',
            ]
        ); 
        Course::create(
            [
                'name' => 'UI/UX Design-EURO',
            ]
        );  
        Course::create(
            [
                'name' => 'Full-Stack IT-Development-UZBEK',
            ]
        );      
        Course::create(
            [
                'name' => 'Full-Stack IT-Marketing-UZBEK',
            ]
        );                

        // Students
        Student::create(
            [
                'name' => 'Alex', 
                'contacts' => 'Toshkent +998 99 111 11 11',                             
                'test_id' => 1, 
                'statuse_id' => 1,   
                'course_id' => 1,         
                'datelesson' => '',
                'timeteacherlesson' => '',
                'note' => 'Russian, HTML/CSS',
                                                 
            ]
        ); 
        Student::create(
            [
                'name' => 'Serg', 
                'contacts' => 'Toshkent +998 99 222 22 22',                             
                'test_id' => 2, 
                'statuse_id' => 2,   
                'course_id' => 1,   
                'datelesson' => '',
                'timeteacherlesson' => '',           
                'note' => 'Russian',
                          
            ]
        ); 
        Student::create(
            [
                'name' => 'Mary', 
                'contacts' => 'Toshkent +998 99 333 33 33',                             
                'test_id' => 1, 
                'statuse_id' => 3,   
                'course_id' => 1,     
                'datelesson' => '2019-12-01',
                'timeteacherlesson' => '16:00, Коськин А.',                
                'note' => 'Russian, English',         
            
            ]
        ); 
        Student::create(
            [
                'name' => 'Maks', 
                'contacts' => 'Toshkent +998 99 444 44 44',
                'test_id' => 2, 
                'statuse_id' => 2,   
                'course_id' => 2,  
                'datelesson' => '',
                'timeteacherlesson' => '',                                 
                'note' => 'Russian',       
                
            ]
        );       
        Student::create(
            [
                'name' => 'Jim', 
                'contacts' => 'Toshkent +998 99 555 55 55',
                'test_id' => 2, 
                'statuse_id' => 3,   
                'course_id' => 2,  
                'datelesson' => '2019-12-01',
                'timeteacherlesson' => '19:00, Кадничанский А.',
                'note' => 'Russian',       
                
            ]
        );                   
        Student::create(
            [
                'name' => 'John', 
                'contacts' => 'Toshkent +998 99 777 77 77',
                'test_id' => 1, 
                'statuse_id' => 1,   
                'course_id' => 3,    
                'datelesson' => '',
                'timeteacherlesson' => '',                   
                'note' => 'Russian, HTML/CSS',               
                
            ]
        );         

    }
}
