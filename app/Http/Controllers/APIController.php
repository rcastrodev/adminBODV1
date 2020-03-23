<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establishment;

class APIController extends Controller
{
    public function getEstablishments()
    {
        $establishments = Establishment::select('establishments.name', 'establishments.owner_name', 'establishments.rif', 'establishments.address', 'establishments.latitude', 'establishments.length', 'establishments.phone', 'establishments.reservation_email', 'establishments.logo', 'establishments.main_image', 'establishments.publish_on_the_web', 'establishments.admit_reservation', 'establishments.linear_discount', 'establishments.description', 'establishments.menu', 'brands.name AS brand_name', 'brands.rif AS brand_rif', 'brands.tel AS brand_tel', 'contact_person AS brand_contact_person', 'brands.email AS brand_email', 'brands.address AS brand_address', 'brands.logo AS brand_logo', 'brands.status AS brad_status', 'types.name AS type_name', 'types.category AS type_category', 'countries.name AS country_name', 'countries.iso AS country_iso', 'countries.utc AS country_utc', 'regions.name AS region_name', 'regions.code AS region_code', 'cities.name AS city_name', 'cities.code AS city_code', 'zones.name AS zone_name', 'zones.code AS zone_code')
                ->leftJoin('brands', 'establishments.brand_id', '=', 'brands.id')
                ->leftJoin('types', 'establishments.type_id', '=', 'types.id')
                ->leftJoin('countries', 'establishments.country_id', '=', 'countries.id')
                ->leftJoin('regions', 'establishments.region_id', '=', 'regions.id')
                ->leftJoin('cities', 'establishments.city_id', '=', 'cities.id')
                ->leftJoin('zones', 'establishments.zone_id', '=', 'zones.id')
                ->orderBy('linear_discount', 'DESC')
                ->get();

        dd($establishments);

    }
}
