<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\User;
use \App\Models\Park;
use \App\Models\Report;
use \App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::truncate();
        Park::truncate();

        /* -- Create admin -- */
        User::factory()->count(2)->create();

        /* -- SEEDING THE PARKS -- */
        $xmlFilePath = 'database/seeders/facilities-data.xml';
        $xml = simplexml_load_file($xmlFilePath);
        $locationNames = [];
        $addresses = [];
        $postalCodes = [];
        $latitudes = [];
        $longitudes = [];
        $cities = [];

        foreach($xml->Location as $location){
            $locationFacilityNames = [];
            $locationFacilityAddresses = [];
            $locationFacilityPostalCodes = [];
            $locationLatitudes = [];
            $locationLongitudes = [];
            $locationCities = [];

            foreach($location->Facilities->Facility as $facility){
                $facilityDisplayName = (string)$facility->FacilityDisplayName;

                if($facilityDisplayName === 'Dogs Off-Leash Area'){
                    $locationFacilityNames[] = (string)$location->LocationName;
                    $locationFacilityAddresses[] = (string)$location->Address;
                    $locationFacilityPostalCodes[] = (string)$location->PostalCode;
                    $locationLatitudes[] = (string)$location->Latitude;
                    $locationLongitudes[] = (string)$location->Longitude;
                    $locationCities[] = (string)$location->City;
                }
            }

            $locationNames = array_merge($locationNames, $locationFacilityNames);
            $addresses = array_merge($addresses, $locationFacilityAddresses);
            $postalCodes = array_merge($postalCodes, $locationFacilityPostalCodes);
            $latitudes = array_merge($latitudes, $locationLatitudes);
            $longitudes = array_merge($longitudes, $locationLongitudes);
            $cities = array_merge($cities, $locationCities);
        }

        for ($i = 0; $i < count($locationNames); $i++){
            Park::factory()->create([
                'park_name' => $locationNames[$i],
                'address' => $addresses[$i],
                'postcode' => $postalCodes[$i],
                'latitude' => $latitudes[$i],
                'longitude' => $longitudes[$i],
                'city' => $cities[$i],
            ]);
        }



        /* -- Create random review -- */
        Review::factory()->count(2)->create();

        /* -- Create random report -- */
        Report::factory()->count(2)->create();

    }
}
