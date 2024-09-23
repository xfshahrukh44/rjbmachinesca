<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\orders;
use App\orders_products;
use App\Product;
use App\imagetable;
use App\Attributes;
use App\AttributeValue;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Image;
use File;
use DB;
use Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Medium;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

		$logo = imagetable::
					 select('img_path')
					 ->where('table_name','=','logo')
					 ->first();

		$favicon = imagetable::
					 select('img_path')
					 ->where('table_name','=','favicon')
					 ->first();

		View()->share('logo',$logo);
		View()->share('favicon',$favicon);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {

        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 1000;

            if (!empty($keyword)) {
                $product = Product::where('products.product_title', 'LIKE', "%$keyword%")
				->leftjoin('categories', 'products.category', '=', 'categories.id')
                ->orWhere('products.description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $product = Product::paginate($perPage);
            }

            return view('admin.product.index', compact('product'));
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

        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $att = Attributes::all();
            $attval = AttributeValue::all();

			// $items = Category::all(['id', 'name']);
			$items = Category::pluck('name', 'id');

            return view('admin.product.create', compact('items', 'att','attval'));
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
        $cat = json_encode($request->category);
        $mediaGallery = json_encode($request->mediaGallery); // Assuming $request is an instance of Illuminate\Http\Request

        // Remove double quotes from the JSON encoded string
        $mediaGallery = str_replace('"', '', $mediaGallery);

        // Remove square brackets from the modified string
        $mediaGallery = str_replace(['[', ']'], '', $mediaGallery);

        // Split the string by comma to get an array of image URLs
        $mediaUrls = explode(',', $mediaGallery);
        // dd($mediaUrls);


	    //echo "<pre>";
	    //print_r($_FILES);
	    //return;

		//dd($_FILES);
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'product_title' => 'required',
		]);

		    //echo implode(",",$_POST['language']);
		    //return;
			$product = new product;
			
			$slug = strtolower(preg_replace('/\s+/', '-', $request->input('product_title')));
            
            $product->product_title = $request->input('product_title');
			$product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->stock_inventory = $request->input('stock_inventory');
			$product->category = $cat;
			$product->is_featured = $request->input('is_featured');
			$product->short_desc = $request->input('short_desc');
			$product->quarter_special = $request->input('quarter_special');
			$product->quarter_special_price = $request->input('quarter_special_price');
			$product->rental_or_lease = $request->input('rental_or_lease');
			$product->optional = $request->input('optional');
			$product->cost_per_page = $request->input('cost_per_page');
			$product->product_type = $request->input('product_type');
			$product->color_type = $request->input('color_type');
			$product->slug = $slug;
            $file = $request->file('image');

            $ebrochure = $request->file('ebrochure');
            if(! is_null(request('ebrochure'))) {
            // Make sure you have a folder inside your storage directory
            $destination_path = 'uploads/products/';
            $profile_ebrochure = date("Ymdhis") . "." . $ebrochure->getClientOriginalExtension();

            // Store the PDF file in the destination path
            $ebrochure->move(public_path($destination_path), $profile_ebrochure);

            $product->ebrochure = $destination_path . $profile_ebrochure;
            }

            if($file != null){
                //make sure yo have image folder inside your public
                $destination_path = 'uploads/products/';
                $profileImage = $file->getClientOriginalName().uniqid().".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

                $product->image = $destination_path.$profileImage;
                $media = new Medium();
                $media->image = $destination_path.$profileImage;
                $media->save();
            }else{
                $product->image = $request->imageExist;
            }



            $product->save();

            // if(! is_null(request('ebrochure'))) {

            //     $photos=request()->file('ebrochure');
            //     foreach ($photos as $photo) {
            //         $destinationPath = 'uploads/products/';

            //         $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
            //         dd($photo,$filename);
            //         Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);

            //         DB::table('product_imagess')->insert([

            //             ['ebrochure' => $destination_path.$filename, 'product_id' => $product->id]

            //         ]);

            //     }

            // }


            if(! is_null(request('images'))) {

                $photos=request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $filename = $photo->getClientOriginalName().uniqid().".".$photo->getClientOriginalExtension();
                    //dd($photo,$filename);
                    Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);

                    DB::table('product_imagess')->insert([

                        ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                    ]);
                    $media = new Medium();
                    $media->image = $destinationPath.$filename;
                    $media->save();

                }

            }else{
                foreach ($mediaUrls as $value) {
                    // dd($value);
                    DB::table('product_imagess')->insert([

                        ['image' => $value, 'product_id' => $product->id]

                    ]);
                }
            }
             //$photos->save();
            //$requestData = $request->all();
            //Product::create($requestData);

            // $attval = $request->attribute;

            // for($i = 0; $i < count($attval); $i++)
            // {
            //     $product_attributes = new ProductAttribute;
            //     $product_attributes->attribute_id = $attval[$i]['attribute_id'];
            //     $product_attributes->value = $attval[$i]['value'];
            //     $product_attributes->price = $attval[$i]['v-price'];
            //     $product_attributes->qty = $attval[$i]['qty'];
            //     $product_attributes->product_id = $product->id;

            //     $product_attributes->save();
            // }





            return redirect('admin/product')->with('message', 'Product added!');
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
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $product = Product::findOrFail($id);
            return view('admin.product.show', compact('product'));
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



        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {

            $att = Attributes::all();
            $product = Product::findOrFail($id);

			$items = Category::pluck('name', 'id');

			$product_images = DB::table('product_imagess')
                          ->where('product_id', $id)
                          ->get();



            return view('admin.product.edit', compact('product','items','product_images','att'));
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
        $mediaGallery = json_encode($request->mediaGallery); // Assuming $request is an instance of Illuminate\Http\Request

        // Remove double quotes from the JSON encoded string
        $mediaGallery = str_replace('"', '', $mediaGallery);

        // Remove square brackets from the modified string
        $mediaGallery = str_replace(['[', ']'], '', $mediaGallery);

        // Split the string by comma to get an array of image URLs
        $mediaUrls = explode(',', $mediaGallery);

        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'product_title' => 'required',
			'description' => 'required'
		]);

		$cat = json_encode($request->category);
		
// 		$slug = str_replace('-', ' ', $request->input('product_title'));
		$slug = strtolower(preg_replace('/\s+/', '-', $request->input('product_title')));

        $requestData['product_title'] = $request->input('product_title');
        $requestData['description'] = $request->input('description');
        $requestData['stock_inventory'] = $request->input('stock_inventory');
		$requestData['sku'] = $request->input('sku');
		$requestData['price'] = $request->input('price');
		$requestData['category'] = $cat;
		$requestData['is_featured'] = $request->input('is_featured');
		$requestData['short_desc'] = $request->input('short_desc');
		$requestData['quarter_special'] = $request->input('quarter_special');
		$requestData['quarter_special_price'] = $request->input('quarter_special_price');
		$requestData['rental_or_lease'] = $request->input('rental_or_lease');
		$requestData['optional'] = $request->input('optional');
		$requestData['cost_per_page'] = $request->input('cost_per_page');
        $requestData['product_type'] = $request->input('product_type');
        $requestData['color_type'] = $request->input('color_type');
        $requestData['slug'] = $slug;

        // Handle the updated PDF file if provided
        $new_ebrochure = $request->file('ebrochure');
        if ($new_ebrochure) {
            // Move the new PDF file to the public directory
            $destination_path = 'uploads/products/';
            $profile_ebrochure = date("Ymdhis") . "." . $new_ebrochure->getClientOriginalExtension();
            $new_ebrochure->move(public_path($destination_path), $profile_ebrochure);

            // Update the product's ebrochure attribute with the file path
            $requestData['ebrochure'] = $destination_path . $profile_ebrochure;

            // Delete the existing ebrochure file
            if ($existing_ebrochure) {
                // Delete the file using the public_path() helper
                unlink(public_path($existing_ebrochure));
            }
        }




        // dump($request->input());
        // die();
    /*Insert your data*/

    // Detail::insert( [
        // 'images'=>  implode("|",$images),
    // ]);

        if ($request->hasFile('image')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->image);

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
            $media = new Medium();
            $media->image = 'uploads/products/'.$fileNameToStore;
            $media->save();
        }elseif($request->imageExist != null){
            $requestData['image'] = $request->imageExist;
        }

            if(! is_null(request('images'))) {

                $photos=request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $filename = $photo->getClientOriginalName().uniqid().".".$photo->getClientOriginalExtension();
                    //dd($photo,$filename);
                    Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);

                    $product = product::where('id', $id)->first();

                    DB::table('product_imagess')->insert([

                        ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                    ]);
                    $media = new Medium();
                    $media->image = $destinationPath.$filename;
                    $media->save();

                }

            }elseif($mediaUrls[0] != "null"){
                foreach ($mediaUrls as $value) {
                    // dd($value);
                    $product = product::where('id', $id)->first();
                    DB::table('product_imagess')->insert([

                        ['image' => $value, 'product_id' => $product->id]

                    ]);
                }
            }

        product::where('id', $id)
                ->update($requestData);


        //     $attval = $request->attribute;
        //     $product_attribute_id = $request->product_attribute;
        //     $oldatt = $request->attribute_id;
        //     $oldval = $request->value;
        //     $oldprice = $request->v_price;
        //     $oldqty = $request->qty;

        //     for($j = 0; $j < count($oldatt); $j++){
        //         $product_attribute = ProductAttribute::find($product_attribute_id[$j]);
        //         $product_attribute->attribute_id = $oldatt[$j];
        //         $product_attribute->value = $oldval[$j];
        //         $product_attribute->price = $oldprice[$j];
        //         $product_attribute->qty = $oldqty[$j];
        //         $product_attribute->save();
        //     }

        //     for($i = 0; $i < count($attval); $i++)
        //     {
        //         $product_attributes = new ProductAttribute;
        //         $product_attributes->attribute_id = $attval[$i]['attribute_id'];
        //         $product_attributes->value = $attval[$i]['value'];
        //         $product_attributes->price = $attval[$i]['v-price'];
        //         $product_attributes->qty = $attval[$i]['qty'];
        //         $product_attributes->product_id = $id;
        //         $product_attributes->save();
        //     }

         /*
        if(! is_null(request('images'))) {


                DB::table('product_imagess')->where('product_id', '=', $id)->delete();

                $photos=request()->file('images');



                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $fileName = uniqid() . "_" . $file->getClientOriginalName();
                    $file->move(storage_path($destinationPath), $fileName);


                    DB::table('product_imagess')->insert([

                        ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                    ]);

                }

        }
        */


             return redirect('admin/product')->with('message', 'Product updated!');
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
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Product::destroy($id);

            return redirect('admin/product')->with('flash_message', 'Product deleted!');
        }
        return response(view('403'), 403);

    }
	public function orderList() {

		$orders = orders::
				    select('orders.*')
				   ->get();

		return view('admin.ecommerce.order-list', compact('orders'));
	}

	public function orderListDetail($id) {

		$order_id = $id;
		$order = orders::where('id',$order_id)->first();
		$order_products = orders_products::where('orders_id',$order_id)->get();



		return view('admin.ecommerce.order-page')->with('title','Invoice #'.$order_id)->with(compact('order','order_products'))->with('order_id',$order_id);

		// return view('admin.ecommerce.order-page');
	}

	public function updatestatuscompleted($id) {

		$order_id = $id;
		$order = DB::table('orders')
              ->where('id', $id)
              ->update(['order_status' => 'Completed']);


		Session::flash('message', 'Order Status Updated Successfully');
						Session::flash('alert-class', 'alert-success');
						return back();

	}
	public function updatestatusPending($id) {

		$order_id = $id;
		$order = DB::table('orders')
              ->where('id', $id)
              ->update(['order_status' => 'Pending']);


		Session::flash('message', 'Order Status Updated Successfully');
						Session::flash('alert-class', 'alert-success');
						return back();

	}

}
