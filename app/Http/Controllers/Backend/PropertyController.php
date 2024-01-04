<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyType;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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

        if ($request->file('property_thambnail')) {
            $manager = new ImageManager(new Driver());
            $str_img_name_gen = hexdec(uniqid()).'.'.$request
            ->file('property_thambnail')->getClientOriginalExtension();


            $str_img = $manager->read($request->file('property_thambnail'))
            ->resize(370,246)->save('upload/property/thambnail/'.$str_img_name_gen);
            $save_url = 'upload/property/thambnail/'.$str_img_name_gen;
        }

        $pcode = IdGenerator::generate([
            'table' => 'properties',
            'field' => 'property_code',
            'length' => 5,
            'prefix' => 'PC'
        ]);

        $property_id = Property::insertGetId([
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

        $images = $request->file('multi_img');

        if ($images) {
            foreach($images as $imgs){
                $manager = new ImageManager(new Driver());
                $name_generate = hexdec(uniqid()) . '.' . $imgs->getClientOriginalExtension();

                // Read the current image in the loop
                $current_image = $manager->read($imgs); // Assuming $image is an instance of UploadedFile

                // Resize and save the current image
                $resized_image = $current_image->resize(370, 246);
                $resized_image->save('upload/property/multi-image/'.$name_generate);
                $multi_imgurl = 'upload/property/multi-image/'.$name_generate;

                MultiImage::insert([
                    'property_id' => $property_id,
                    'photo_name' => $multi_imgurl,
                    'created_at' => Carbon::now(), // Assuming this field represents the creation timestamp
                    // You may want to use 'updated_at' if this represents the last update timestamp
                ]);
            }
        }


        $notification = array(
           'message' => "Property's Created Successfully",
           'alert-type' => "success"
        );

        return redirect()->route('all.property')->with($notification);
    }// End Metho

    // EditProperty
    public function EditProperty($id){

        $multiImage = MultiImage::where('property_id',$id)->get();

        $properties = Property::findOrFail($id);
        $propertytype = PropertyType::latest()->get();
        return view('backend.property.edit_property',compact('properties', 'propertytype', 'multiImage'));

    }// End Method

    // UpdateType
    public function UpdateProperty(Request $request){

        $property_id = $request->id;

        Property::findOrFail($property_id)->update([
            'ptype_id' => $request->ptype_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
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
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.property')->with($notification);
    }

    public function UpdatePropertyThambnail(Request $request){

        $propthamb_id = $request->id;
        $oldImage = $request->old_img;

        if ($request->file('property_thambnail')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request
            ->file('property_thambnail')->getClientOriginalExtension();


            $img = $manager->read($request->file('property_thambnail'))
            ->resize(370,246)->save('upload/property/thambnail/'.$name_gen);
            $save_url = 'upload/property/thambnail/'.$name_gen;
        }

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Property::findOrFail($propthamb_id)->update([

            'property_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Property Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PropertyThambnailDelete($id){
        $mainThambnailImage = Property::findOrFail($id);
        unlink($mainThambnailImage->property_thambnail);

        Property::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Main Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdatePropertyMultiimage(Request $request){
        $images = $request->multi_img;

        foreach($images as $id => $image){

            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);

            if ($request->file('multiimage')) {
                $manager = new ImageManager(new Driver());
                $multiimgname_gen = hexdec(uniqid())
                .'.'.$request->file('multiimage')->getClientOriginalExtension();

                $image =  $manager->read($request->file('multiimage'))
                ->resize(770,520)->save('upload/property/multi-image/'.$multiimgname_gen);

                $multiImageUploadPath = 'upload/property/multi-image/'.$multiimgname_gen;

                MultiImage::where('id',$id)->update([

                    'photo_name' => $multiImageUploadPath,
                    'updated_at' => Carbon::now(),

                ]);
            }
        } // End Foreach

        $notification = array(
            'message' => 'Property Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PropertyMultiImageDelete($id){

        $oldImg = MultiImage::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function StoreNewMultiimage(Request $request){
        $storeNewMultiImg = $request->imageid;
        $image = $request->file('multi_img');

        if ($image) {
            $manager = new ImageManager(new Driver());
            $multiimgname_gen = hexdec(uniqid())
            .'.'.$image->getClientOriginalExtension();
            $image =  $manager->read($image)
                ->resize(770,520)->save('upload/property/multi-image/'.$multiimgname_gen);

            $multiImageUploadPath = 'upload/property/multi-image/'.$multiimgname_gen;

            MultiImage::insert([
                'property_id' => $storeNewMultiImg,
                'photo_name' => $multiImageUploadPath,
                'created_at' => Carbon::now(),
            ]);
        }


        $notification = array(
            'message' => 'Property Multi Image Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProperty($id){
        $property = Property::findOrFail($id);
        unlink($property->property_thambnail);

        Property::findOrFail($id)->delete();

        $image = MultiImage::where('property_id',$id)->get();

        foreach($image as $img){
            unlink($img->photo_name);
            MultiImage::where('property_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Property Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
