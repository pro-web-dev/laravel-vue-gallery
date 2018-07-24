<?php

namespace App\Http\Controllers\Api;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return Gallery::all();

    }

    public function store(Request $request)
    {
        $image = Gallery::create($request->all());
        return $image;
        $this->validate($request, [
            'image' => 'required'
        ]);
        $images = Gallery::create($request->all());
        (new Gallery)->uploadImage($request->file('image'));
        return $images;
    }

    public function show($id)
    {
        return Gallery::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);
        $image = Gallery::find($id);
        $image->uploadImage($request->file('file'));
        $image->update($request->all());

        return $image;
    }

    public function destroy($id)
    {
        Gallery::find($id)->delete();
        return $id;
    }
}
