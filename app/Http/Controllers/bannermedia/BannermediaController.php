<?php

namespace App\Http\Controllers\bannermedia;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Bannermedia;
use Illuminate\Http\Request;
use Image;
use File;

class BannermediaController extends Controller
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
                $bannermedia = Bannermedia::where('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $bannermedia = Bannermedia::paginate($perPage);
            }

            return view('bannermedia.bannermedia.index', compact('bannermedia'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
            return view('bannermedia.bannermedia.create');


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

            $bannermedia = new Bannermedia($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $bannermedia_path = 'uploads/banner/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($bannermedia_path) . DIRECTORY_SEPARATOR. $profileImage);

                $bannermedia->image = $bannermedia_path.$profileImage;
            }

            $bannermedia->save();
            return redirect()->back()->with('message', 'Banner Media added!');

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
            $bannermedia = Bannermedia::findOrFail($id);
            return view('bannermedia.bannermedia.show', compact('bannermedia'));

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
            $bannermedia = Bannermedia::findOrFail($id);
            return view('bannermedia.bannermedia.edit', compact('bannermedia'));

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

            $bannermedia = Bannermedia::where('id', $id)->first();
            $image_path = public_path($bannermedia->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/banner/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/banner/'.$fileNameToStore;
        }


            $bannermedia = Bannermedia::findOrFail($id);
            $bannermedia->update($requestData);
            return redirect()->back()->with('message', 'Bannermedia updated!');


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
            Bannermedia::destroy($id);
            return redirect()->back()->with('message', 'Bannermedia deleted!');


    }
}
