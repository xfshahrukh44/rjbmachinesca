<?php

namespace App\Http\Controllers\newpressrelease;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Newpressrelease;
use Illuminate\Http\Request;
use Image;
use File;

class NewpressreleaseController extends Controller
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
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $newpressrelease = Newpressrelease::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $newpressrelease = Newpressrelease::paginate($perPage);
            }

            return view('newpressrelease.newpressrelease.index', compact('newpressrelease'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('newpressrelease.newpressrelease.create');
        }
        return response(view('403'), 403);

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
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $newpressrelease = new Newpressrelease($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $newpressrelease_path = 'uploads/newpressreleases/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($newpressrelease_path) . DIRECTORY_SEPARATOR. $profileImage);

                $newpressrelease->image = $newpressrelease_path.$profileImage;
            }
            
            $newpressrelease->save();
            return redirect()->back()->with('message', 'Newpressrelease added!');
        }
        return response(view('403'), 403);
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
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $newpressrelease = Newpressrelease::findOrFail($id);
            return view('newpressrelease.newpressrelease.show', compact('newpressrelease'));
        }
        return response(view('403'), 403);
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
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $newpressrelease = Newpressrelease::findOrFail($id);
            return view('newpressrelease.newpressrelease.edit', compact('newpressrelease'));
        }
        return response(view('403'), 403);
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
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $newpressrelease = Newpressrelease::where('id', $id)->first();
            $image_path = public_path($newpressrelease->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/newpressreleases/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/newpressreleases/'.$fileNameToStore;               
        }


            $newpressrelease = Newpressrelease::findOrFail($id);
            $newpressrelease->update($requestData);
            return redirect()->back()->with('message', 'Newpressrelease updated!');
        }
        return response(view('403'), 403);

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
        $model = str_slug('newpressrelease','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Newpressrelease::destroy($id);
            return redirect()->back()->with('message', 'Newpressrelease deleted!');
        }
        return response(view('403'), 403);

    }
}
