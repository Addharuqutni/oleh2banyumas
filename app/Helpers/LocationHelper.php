<?php

namespace App\Helpers;

class LocationHelper
{
    /**
     * Menghitung jarak antara dua titik koordinat menggunakan formula Haversine
     * 
     * @param float $lat1 Latitude titik pertama
     * @param float $lon1 Longitude titik pertama
     * @param float $lat2 Latitude titik kedua
     * @param float $lon2 Longitude titik kedua
     * @param string $unit Satuan jarak ('km' atau 'mi')
     * @return float Jarak dalam satuan yang ditentukan
     */
    public static function calculateDistance($lat1, $lon1, $lat2, $lon2, $unit = 'km')
    {
        // Konversi derajat ke radian
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
        
        // Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat/2) * sin($dlat/2) + cos($lat1) * cos($lat2) * sin($dlon/2) * sin($dlon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        
        // Radius bumi dalam km
        $radius = 6371;
        
        // Hitung jarak
        $distance = $radius * $c;
        
        // Konversi ke mil jika diperlukan
        if ($unit == 'mi') {
            $distance *= 0.621371;
        }
        
        return $distance;
    }
}