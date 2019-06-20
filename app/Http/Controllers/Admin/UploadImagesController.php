<?php

namespace App\Http\Controllers\Admin;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class UploadImagesController extends Controller
{

    private $photos_path;

    public function __construct()
    {
        $this->photos_path = public_path('/images');
    }

    /**
     * Saving images uploaded through XHR Request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postImages(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $photos = $request->file('file');
                $imageId = '';

                if (!is_array($photos)) {
                    $photos = [$photos];
                }

                if (!is_dir($this->photos_path)) {
                    mkdir($this->photos_path, 0777);
                }

                for ($i = 0; $i < count($photos); $i++) {
                    $photo = $photos[$i];
                    $name = sha1(date('YmdHis') . str_random(30));
                    $save_name = $name . '.' . $photo->getClientOriginalExtension();
                    $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

                    Image::make($photo)
                        ->resize(250, null, function ($constraints) {
                            $constraints->aspectRatio();
                        })
                        ->save($this->photos_path . '/' . $resize_name);

                    $photo->move($this->photos_path, $save_name);

//                    $upload->filename = $save_name;
//                    $upload->resized_name = $resize_name;
//                    $upload->original_name = basename($photo->getClientOriginalName());
//                    $upload->save();
                    $upload = Upload::create([
                        'filename' => $save_name,
                        'resized_name' => $resize_name,
                        'original_name' => basename($photo->getClientOriginalName())
                    ]);
                    $imageId = $upload->id;
//                    $request->session()->push('image_id', $upload->id);
                }
//                $imageId[] = $request->session()->get('image_id');
//                return view('admin.product.create')->with([
//                    'message' => 'Image saved Successfully',
//                    'image_id' => $imageId
//                ]);
                return Response::json([
                    'message' => 'Image saved Successfully',
                    'image_id' => $imageId
                ], 200);
            }
        }
    }

    /**
     * Remove the images from the storage.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $filename = $request->id;
        $uploaded_image = Upload::where('original_name', basename($filename))->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->filename;
        $resized_file = $this->photos_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($resized_file)) {
            unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }
}