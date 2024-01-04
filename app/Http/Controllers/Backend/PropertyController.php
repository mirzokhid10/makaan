<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdditionalImages;
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

    // Store Property
    public function StoreProperty(Request $request){

        if ($request->file('property_mainimage')) {
            $manager = new ImageManager(new Driver());
            $str_img_name_gen = hexdec(uniqid()).'.'.$request
            ->file('property_mainimage')->getClientOriginalExtension();


            $str_img = $manager->read($request->file('property_mainimage'))
            ->resize(370,246)->save('upload/property/thambnail/'.$str_img_name_gen);
            $save_url = 'upload/property/thambnail/'.$str_img_name_gen;

        }

        $property_code = IdGenerator::generate([
            'table' => 'properties',
            'field' => 'property_code',
            'length' => 5,
            'prefix' => 'PC'
        ]);

        $storePropertyId = Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code' => $property_code,
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
            'property_mainimage' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $images = $request->file('additional_images');

        if ($images) {
            foreach($images as $imgs){
                $manager = new ImageManager(new Driver());
                $name_generate = hexdec(uniqid()) . '.' . $imgs->getClientOriginalExtension();

                // Read the current image in the loop
                $current_image = $manager->read($imgs); // Assuming $image is an instance of UploadedFile

                // Resize and save the current image
                $resized_image = $current_image->resize(370, 246);
                $resized_image->save('upload/property/additional_images/'.$name_generate);
                $additional_imagesurl = 'upload/property/additional_images/'.$name_generate;

                AdditionalImages::insert([
                    'property_id' => $storePropertyId,
                    'photo_name' => $additional_imagesurl,
                    'created_at' => Carbon::now(),
                ]);
            }
        }


        $notification = array(
           'message' => "Property's Created Successfully",
           'alert-type' => "success"
        );

        return redirect()->route('all.property')->with($notification);
    }// End Store Property

    // Edit Property
    public function EditProperty($id){

        $editAdditionalImages = AdditionalImages::where('property_id',$id)->get();
        $additional_images = AdditionalImages::where('property_id',$id)->get();
        $properties = Property::findOrFail($id);
        $propertytype = PropertyType::latest()->get();
        return view('backend.property.edit_property',
        compact('properties', 'propertytype', 'editAdditionalImages', 'additional_images'));

    }
    // End Method

    // UpdateType
    public function UpdateProperty(Request $request){

        $updatePropertyId = $request->id;

        Property::findOrFail($updatePropertyId)->update([
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

    public function UpdatePropertyMainImage(Request $request){

        $updatePropertyMainImageId = $request->mainImageId;
        $prevPropertyMainImage = $request->oldMainImage;

        if ($request->file('property_mainimage')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request
            ->file('property_mainimage')->getClientOriginalExtension();


            $img = $manager->read($request->file('property_mainimage'))
            ->resize(370,246)->save('upload/property/main_image/'.$name_gen);
            $save_url = 'upload/property/main_image/'.$name_gen;
        }

        // Prev Photo will be deleted
        if (file_exists($prevPropertyMainImage)) {
            unlink($prevPropertyMainImage);
        }

        Property::findOrFail($updatePropertyMainImageId)->update([

            'property_mainimage' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Property Main Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // public function PropertyThambnailDelete($id){
    //     $mainThambnailImage = Property::findOrFail($id);
    //     unlink($mainThambnailImage->property_mainimage);

    //     Property::findOrFail($id)->delete();

    //     $notification = array(
    //         'message' => 'Property Main Image Deleted Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }

    public function UpdatePropertyAdditionalImages(Request $request){
        $updPropAdditionalImages = $request->additional_images;

        foreach($updPropAdditionalImages as $id => $updPropAddimg){

            $updPropAdditionalImagesDel = AdditionalImages::findOrFail($id);
            unlink($updPropAdditionalImagesDel->photo_name);

            if ($request->file('additional_images')) {
                $manager = new ImageManager(new Driver());
                $additionalImagesNameGen = hexdec(uniqid())
                .'.'.$updPropAddimg->getClientOriginalExtension();

                $updAddImgCrt =  $manager->read($updPropAddimg)
                ->resize(770,520)->save('upload/property/additional_images/'.$additionalImagesNameGen);

                $multiImageUploadPath = 'upload/property/additional_images/'.$additionalImagesNameGen;

                AdditionalImages::where('id',$id)->update([

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

    public function PropertyAdditionalImagesDelete($id){

        $prevAdditionalImages = AdditionalImages::findOrFail($id);
        unlink($prevAdditionalImages->photo_name);

        AdditionalImages::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // public function StoreNewMultiimage(Request $request){
    //     $storeNewMultiImg = $request->imageid;
    //     $image = $request->file('additional_images');

    //     if ($image) {
    //         $manager = new ImageManager(new Driver());
    //         $multiimgname_gen = hexdec(uniqid())
    //         .'.'.$image->getClientOriginalExtension();
    //         $image =  $manager->read($image)
    //             ->resize(770,520)->save('upload/property/additional_images/'.$multiimgname_gen);

    //         $multiImageUploadPath = 'upload/property/additional_images/'.$multiimgname_gen;

    //         MultiImage::insert([
    //             'property_id' => $storeNewMultiImg,
    //             'photo_name' => $multiImageUploadPath,
    //             'created_at' => Carbon::now(),
    //         ]);
    //     }


    //     $notification = array(
    //         'message' => 'Property Multi Image Added Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }

    // public function DeleteProperty($id){
    //     $property = Property::findOrFail($id);
    //     unlink($property->property_mainimage);

    //     Property::findOrFail($id)->delete();

    //     $image = MultiImage::where('property_id',$id)->get();

    //     foreach($image as $img){
    //         unlink($img->photo_name);
    //         MultiImage::where('property_id',$id)->delete();
    //     }

    //     $notification = array(
    //         'message' => 'Property Deleted Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }
}
