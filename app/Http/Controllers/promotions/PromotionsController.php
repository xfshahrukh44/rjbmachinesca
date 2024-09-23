<?php

namespace App\Http\Controllers\promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Image;
use File;

class PromotionsController extends Controller
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
                $promotions = Promotion::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('pdf', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $promotions = Promotion::paginate($perPage);
            }

            return view('promotions.promotions.index', compact('promotions'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
            return view('promotions.promotions.create');
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



            $promotions = new Promotion($request->all());
            $pdf = $request->file('pdf');
            if(! is_null(request('pdf'))) {
            // Make sure you have a folder inside your storage directory
            $destination_path = 'uploads/products/';
            $profile_pdf = date("Ymdhis") . "." . $pdf->getClientOriginalExtension();

            // Store the PDF file in the destination path
            $pdf->move(public_path($destination_path), $profile_pdf);

            $promotions->pdf = $destination_path . $profile_pdf;
            }

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $promotions_path = 'uploads/promotionss/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($promotions_path) . DIRECTORY_SEPARATOR. $profileImage);

                $promotions->image = $promotions_path.$profileImage;
            }

            $promotions->save();
            return redirect()->back()->with('message', 'Promotion added!');

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

            $promotion = Promotion::findOrFail($id);
            return view('promotions.promotions.show', compact('promotion'));

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

            $promotion = Promotion::findOrFail($id);
            return view('promotions.promotions.edit', compact('promotion'));

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

            // Handle the updated PDF file if provided
            $new_pdf = $request->file('pdf');
            if ($new_pdf) {
                // Move the new PDF file to the public directory
                $destination_path = 'uploads/products/';
                $profile_pdf = date("Ymdhis") . "." . $new_pdf->getClientOriginalExtension();
                $new_pdf->move(public_path($destination_path), $profile_pdf);

                // Update the product's pdf attribute with the file path
                $requestData['pdf'] = $destination_path . $profile_pdf;

                // Delete the existing pdf file
                if ($existing_pdf) {
                    // Delete the file using the public_path() helper
                    unlink(public_path($existing_pdf));
                }
            }


        if ($request->hasFile('image')) {

            $promotions = Promotion::where('id', $id)->first();
            $image_path = public_path($promotions->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/promotionss/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


             $requestData['image'] = 'uploads/promotionss/'.$fileNameToStore;
        }


            $promotion = Promotion::findOrFail($id);
            $promotion->update($requestData);
            return redirect()->back()->with('message', 'Promotion updated!');


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
            Promotion::destroy($id);
            return redirect()->back()->with('message', 'Promotion deleted!');

    }
}
