<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function image_upload()
    {
        return view('image-upload');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function upload_post_image(Request $request)
    {
        $files = $request->file('image');
        if (!empty($files)) {
            foreach ($files as $file) {
                $imageName = time() . $file->getClientOriginalName();
                $filePath = 'images/' . $imageName;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
            }
        }

//        print_r($request->all());
//        $request->validate([
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//        if($request->hasfile('image'))
//        {
//            $file = $request->file('image');
//            $imageName=time().$file->getClientOriginalName();
//            $filePath = 'images/' . $imageName;
//            Storage::disk('s3')->put($filePath, file_get_contents($file));
//            return back()->with('success','You have successfully upload image.');
//        }
    }
}
