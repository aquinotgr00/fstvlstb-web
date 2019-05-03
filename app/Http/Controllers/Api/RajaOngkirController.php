<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;
use DB;
use function GuzzleHttp\json_encode;

class RajaOngkirController extends Controller
{
    protected $client;
    protected $key;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://pro.rajaongkir.com/api/'
        ]);
        $this->key      = '6c40cd040e674cd568384287e0ef794d';
    }

    public function getSubdistrict(Request $request)
    {
        $key = $request->term;
        $data = DB::table('cities')
            ->join('subdistricts', 'cities.id', '=', 'subdistricts.city_id')
            ->join('provinces', 'cities.province_id', '=', 'provinces.id' )
            ->select('cities.postal_code', 'cities.name as city_name', 'cities.id',
                    'subdistricts.name', 'subdistricts.id as subdistrict_id', 'provinces.name as province_name')
            ->where('subdistricts.name', 'LIKE', '%'.$key.'%')
            ->get()
            ->toArray();
        $count = 0;
        foreach ($data as $key => $value) {
            $response[$count]['id'] = $value->id;
            $response[$count]['value'] = $value->name;
            $response[$count]['label'] = $value->name.', '.$value->city_name;
            $response[$count]['postal_code'] = $value->postal_code;
            $response[$count]['city_name'] = $value->city_name;
            $response[$count]['province_name'] = $value->province_name;
            $response[$count]['subdistrict_id'] = $value->subdistrict_id;
            $count++;
        }
        return response()->json($response);
    }

    public function getShippingCost(Request $request)
    {
        // return $request->all();
        $request->validate([
            'origin' => 'required', // ID kota/kabupaten atau kecamatan asal
            'destination' => 'required', // ID kota/kabupaten atau kecamatan tujuan
            'weight' => 'required',
            'courier' => 'required',
        ]);
        $req = $this->client->request('POST', 'cost', [
            'headers' => [
                'Accept'   => 'application/json',
                'key'      => $this->key
            ],
            'form_params' => $request->all()
        ]);
        $response   = $req->getBody()->getContents();
        $collection = json_decode($response);
        return response()->json($collection->rajaongkir);
    }

    public function getWayBill(Request $request)
    {
        $request->validate([
            'waybill' => 'required',
            'courier' => 'required'
        ]);
        $req = $this->client->request('POST', 'waybill', [
            'headers' => [
                'Accept'   => 'application/json',
                'key'      => $this->key
            ],
            'form_params' => $request->all()
        ]);
        $response   = $req->getBody()->getContents();
        $collection = json_decode($response);
        return new RajaOngkirResource($collection->rajaongkir);
    }
}
