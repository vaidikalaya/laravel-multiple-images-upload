<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{
    public function uploadImage(Request $request){

        $test=$request->validate([
            'images' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg|max:2048'
        ],[
            'images.*.required' => 'Please upload an image',
            'images.*.mimes' => 'Only jpeg,png images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 2MB',
        ]);

        try{

            $imagesURL=[];
            $uploaded_path=public_path('uploads/images/');

            foreach($request->images as $image){
                $image_name=time().'-'.$image->getClientOriginalName();
                $image->move($uploaded_path,$image_name);
                $img_path=asset('uploads/images/'.$image_name);
                array_push($imagesURL,$img_path);
            }
            

            return back()->with('success_msg','images uploaded successfully')
                        ->with('uploaded_img',$imagesURL);
        }
        catch(Exception $e){
            return $e;
        }
    }
}


/*
$validator=Validator::make($request->all(),[
            'images' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        if($validator->fails()) {
            return back()->with('error_msg','all images must be type of jgp or png and max size 2');
        }
*/