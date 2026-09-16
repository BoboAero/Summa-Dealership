<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Part;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
          Users
        */

        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
        ]);

        $user3 = User::create([
            'name' => 'Mike Johnson',
            'email' => 'mike@example.com',
            'password' => Hash::make('password'),
        ]);

        $user4 = User::create([
            'name' => 'Emily Davis',
            'email' => 'emily@example.com',
            'password' => Hash::make('password'),
        ]);

        $user5 = User::create([
            'name' => 'David Wilson',
            'email' => 'david@example.com',
            'password' => Hash::make('password'),
        ]);

        $user6 = User::create([
            'name' => 'Sarah Brown',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password'),
        ]);

        $user7 = User::create([
            'name' => 'James Miller',
            'email' => 'james@example.com',
            'password' => Hash::make('password'),
        ]);

        $user8 = User::create([
            'name' => 'Laura Taylor',
            'email' => 'laura@example.com',
            'password' => Hash::make('password'),
        ]);

        $user9 = User::create([
            'name' => 'Robert Anderson',
            'email' => 'robert@example.com',
            'password' => Hash::make('password'),
        ]);

        $user10 = User::create([
            'name' => 'Emma Thomas',
            'email' => 'emma@example.com',
            'password' => Hash::make('password'),
        ]);


        /*
          Cars
        */

        $car1 = Car::create([
            'name' => 'Toyota',
            'model' => 'Corolla',
            'year' => 2020,
        ]);

        $car2 = Car::create([
            'name' => 'BMW',
            'model' => '3 Series',
            'year' => 2019,
        ]);

        $car3 = Car::create([
            'name' => 'Volkswagen',
            'model' => 'Golf',
            'year' => 2021,
        ]);

        $car4 = Car::create([
            'name' => 'Audi',
            'model' => 'A4',
            'year' => 2022,
        ]);

        $car5 = Car::create([
            'name' => 'Ford',
            'model' => 'Focus',
            'year' => 2018,
        ]);

        $car6 = Car::create([
            'name' => 'Mercedes-Benz',
            'model' => 'C-Class',
            'year' => 2023,
        ]);

        $car7 = Car::create([
            'name' => 'Honda',
            'model' => 'Civic',
            'year' => 2020,
        ]);

        $car8 = Car::create([
            'name' => 'Nissan',
            'model' => 'Qashqai',
            'year' => 2022,
        ]);

        $car9 = Car::create([
            'name' => 'Tesla',
            'model' => 'Model 3',
            'year' => 2024,
        ]);

        $car10 = Car::create([
            'name' => 'Hyundai',
            'model' => 'Tucson',
            'year' => 2021,
        ]);


        /*
          Parts
        */

        $brakePads = Part::create([
            'name' => 'Brake Pads',
            'price' => 79.95,
            'stock' => 20,
        ]);

        $oilFilter = Part::create([
            'name' => 'Oil Filter',
            'price' => 14.50,
            'stock' => 50,
        ]);

        $airFilter = Part::create([
            'name' => 'Air Filter',
            'price' => 24.99,
            'stock' => 30,
        ]);

        $sparkPlugs = Part::create([
            'name' => 'Spark Plugs',
            'price' => 39.95,
            'stock' => 25,
        ]);

        $battery = Part::create([
            'name' => 'Car Battery',
            'price' => 119.99,
            'stock' => 10,
        ]);

        $tires = Part::create([
            'name' => 'Front Tires',
            'price' => 149.50,
            'stock' => 12,
        ]);

        $brakeFluid = Part::create([
            'name' => 'Brake Fluid',
            'price' => 19.95,
            'stock' => 35,
        ]);

        $acFilter = Part::create([
            'name' => 'AC Filter',
            'price' => 29.99,
            'stock' => 18,
        ]);

        $headlights = Part::create([
            'name' => 'LED Headlights',
            'price' => 89.95,
            'stock' => 15,
        ]);

        $wipers = Part::create([
            'name' => 'Windshield Wipers',
            'price' => 34.50,
            'stock' => 25,
        ]);


        /*
          Repairs
        */

        $repair1 = Repair::create([
            'description' => 'Brake pads need to be replaced.',
            'user_id' => $user1->id,
            'car_id' => $car1->id,
        ]);

        $repair2 = Repair::create([
            'description' => 'Regular maintenance and oil change.',
            'user_id' => $user2->id,
            'car_id' => $car2->id,
        ]);

        $repair3 = Repair::create([
            'description' => 'Engine maintenance and battery replacement.',
            'user_id' => $user3->id,
            'car_id' => $car3->id,
        ]);

        $repair4 = Repair::create([
            'description' => 'Front tires need to be replaced.',
            'user_id' => $user4->id,
            'car_id' => $car4->id,
        ]);

        $repair5 = Repair::create([
            'description' => 'Air conditioning filter needs to be replaced.',
            'user_id' => $user5->id,
            'car_id' => $car5->id,
        ]);

        $repair6 = Repair::create([
            'description' => 'Brake fluid needs to be changed.',
            'user_id' => $user6->id,
            'car_id' => $car6->id,
        ]);

        $repair7 = Repair::create([
            'description' => 'Suspension inspection and spark plug replacement.',
            'user_id' => $user7->id,
            'car_id' => $car7->id,
        ]);

        $repair8 = Repair::create([
            'description' => 'Headlights need to be replaced.',
            'user_id' => $user8->id,
            'car_id' => $car8->id,
        ]);

        $repair9 = Repair::create([
            'description' => 'Transmission inspection and regular maintenance.',
            'user_id' => $user9->id,
            'car_id' => $car9->id,
        ]);

        $repair10 = Repair::create([
            'description' => 'Windshield wipers need to be replaced.',
            'user_id' => $user10->id,
            'car_id' => $car10->id,
        ]);


        /*
          Attach Parts to Repairs
        */

        $repair1->parts()->attach([
            $brakePads->id,
        ]);

        $repair2->parts()->attach([
            $oilFilter->id,
            $airFilter->id,
        ]);

        $repair3->parts()->attach([
            $sparkPlugs->id,
            $battery->id,
            $oilFilter->id,
        ]);

        $repair4->parts()->attach([
            $tires->id,
        ]);

        $repair5->parts()->attach([
            $acFilter->id,
            $airFilter->id,
        ]);

        $repair6->parts()->attach([
            $brakeFluid->id,
        ]);

        $repair7->parts()->attach([
            $sparkPlugs->id,
            $airFilter->id,
        ]);

        $repair8->parts()->attach([
            $headlights->id,
        ]);

        $repair9->parts()->attach([
            $oilFilter->id,
            $sparkPlugs->id,
        ]);

        $repair10->parts()->attach([
            $wipers->id,
        ]);

    }
}
