<?php

namespace App\Http\Controllers\kyoceraaward;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Kyoceraaward;
use Illuminate\Http\Request;
use Image;
use File;

class KyoceraawardController extends Controller
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
                $kyoceraaward = Kyoceraaward::where('title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $kyoceraaward = Kyoceraaward::paginate($perPage);
            }

            return view('kyoceraaward.kyoceraaward.index', compact('kyoceraaward'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

            return view('kyoceraaward.kyoceraaward.create');
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
            $kyoceraaward = new Kyoceraaward($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $kyoceraaward_path = 'uploads/kyoceraawards/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($kyoceraaward_path) . DIRECTORY_SEPARATOR. $profileImage);

                $kyoceraaward->image = $kyoceraaward_path.$profileImage;
            }

            $kyoceraaward->save();
            return redirect()->back()->with('message', 'Kyoceraaward added!');
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
            $kyoceraaward = Kyoceraaward::findOrFail($id);
            return view('kyoceraaward.kyoceraaward.show', compact('kyoceraaward'));
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
            $kyoceraaward = Kyoceraaward::findOrFail($id);
            return view('kyoceraaward.kyoceraaward.edit', compact('kyoceraaward'));
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

            $kyoceraaward = Kyoceraaward::where('id', $id)->first();
            $image_path = public_path($kyoceraaward->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/kyoceraawards/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/kyoceraawards/'.$fileNameToStore;
        }


            $kyoceraaward = Kyoceraaward::findOrFail($id);
            $kyoceraaward->update($requestData);
            return redirect()->back()->with('message', 'Kyoceraaward updated!');
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
        Kyoceraaward::destroy($id);
        return redirect()->back()->with('message', 'Kyoceraaward deleted!');
    }
}
