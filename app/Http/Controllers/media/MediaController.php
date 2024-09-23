<?php

namespace App\Http\Controllers\media;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Medium;
use Illuminate\Http\Request;
use Image;
use File;

class MediaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $media = Medium::where('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $media = Medium::paginate($perPage);
            }

            return view('media.media.index', compact('media'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
            return view('media.media.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $media = new Medium($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $media_path = 'uploads/products/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($media_path) . DIRECTORY_SEPARATOR. $profileImage);

                $media->image = $media_path.$profileImage;
            }

            $media->save();
            return redirect()->back()->with('message', 'Medium added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
            $medium = Medium::findOrFail($id);
            return view('media.media.show', compact('medium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
            $medium = Medium::findOrFail($id);
            return view('media.media.edit', compact('medium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

            $requestData = $request->all();


        if ($request->hasFile('image')) {

            $media = Medium::where('id', $id)->first();
            $image_path = public_path($media->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/products/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/products/'.$fileNameToStore;
        }


            $medium = Medium::findOrFail($id);
            $medium->update($requestData);
            return redirect()->back()->with('message', 'Medium updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
            Medium::destroy($id);
            return redirect()->back()->with('message', 'Medium deleted!');

    }
}
