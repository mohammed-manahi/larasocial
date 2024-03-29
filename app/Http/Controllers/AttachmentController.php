<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachment;
use App\Http\Requests;

class AttachmentController extends Controller
{
    public function imageUpload()
    {
        return view('image-upload');
    }

    /**
     * Manage Post Request
     *
     * @return void
     */
    public function imageUploadPost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        return redirect('post/create')->with('success', 'Image Uploaded successfully.')->with('path', $imageName);
    }

}
