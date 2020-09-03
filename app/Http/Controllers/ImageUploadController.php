<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
class ImageUploadController extends Controller {


    public function imageUpload() {
        return view('imageUpload');
    }
  

    public function imageUploadPost(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $full_name = $request->image->getClientOriginalName();
        $split_name = explode(".",$full_name);
        $imageName = $split_name[0].'-'.date("h-i-s").'.'.$split_name[1];
        $db_path = url('/public/images').'/'.$imageName;

        \DB::table('images')->insert([
            'url' => $db_path,
            'name' => $full_name,
            'created_at' => date("Y-m-d H:i:s")
        ]);
   
        $request->image->move(public_path('images'), $imageName);
           
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }


}