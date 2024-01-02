<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class PropertyController extends Controller
{
    // AllProperty
    public function AllProperty(){

        $properties = Property::latest()->get();
        return view('backend.property.all_property',compact('properties'));

    }

    // AddProperty
    public function AddProperty(){
        $propertytype = PropertyType::latest()->get();
        return view('backend.property.add_property', compact('propertytype'));
    } // End Method

    // StoreType
    public function StoreProperty(Request $request){

        $pcode = IdGenerator::generate([
            'table' => 'properties',
            'field' => 'property_code',
            'length' => 5,
            'prefix' => 'PC'
        ]);

        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request->file('property')->getClientOriginalExtension();
        $img = $manager->read($request->file('property'));
        $img = $img->resize(370,246);
        $img->toJpeg(80)->save(base_path('upload/property/thambnail/'.$name_gen));
        $save_url = 'upload/property/thambnail/'.$name_gen;



        Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code' => $pcode,
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'status' => 1,
            'property_thambnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
           'message' => "Property's Created Successfully",
           'alert-type' => "success"
        );

        return redirect()->route('all.property')->with($notification);
    }// End Metho
}
