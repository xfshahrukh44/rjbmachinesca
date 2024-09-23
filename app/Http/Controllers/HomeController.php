<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\Banner;
use App\imagetable;
use DB; 
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Page;
use Image;
use App\Blog;
use App\Testimonial;
use App\Models\Newpressrelease;
use App\Models\Kyoceraaward;
use App\Product;
use App\Models\Subcategory;
use App\Models\Promotion;

class HomeController extends Controller
{
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;

    public function __construct()
    {
        //$this->middleware('auth');

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $page = DB::table('pages')->where('id', 1)->first();
       $section = DB::table('section')->where('page_id', 1)->get();
       $banner = Banner::orderBy('order_by', 'asc')->where('status', '1')->get();
       $blog = Blog::where('is_home', '1')->get(); 
       $testimonial = Testimonial::all();
       $featuredProducts = Product::where('is_featured', 1)->take(12)->get();
       $subcategory = Subcategory::take(3)->get();

       return view('welcome', compact('page', 'section', 'banner', 'blog', 'testimonial', 'featuredProducts','subcategory'));
    }

    public function about()
    {
       $page = DB::table('pages')->where('id', 2)->first();
       $section = DB::table('section')->where('page_id', 2)->get();

       return view('about', compact('page', 'section'));
    }

    public function blog()
    {
       $page = DB::table('pages')->where('id', 3)->first();
        
       $get_blog = DB::table('blogs')->where('is_home', '0')->get();
            
       return view('blog', compact('page', 'get_blog'));
    }

    public function blog_detail($slug)
    {
        
        // dd($slug);
        $get_blogg = DB::table('blogs')->where('slug', $slug)->get();
        
        // dd($get_blogg);
    
    
        $blog_detail = Blog::where('id', $get_blogg[0]->id)->where('is_home', '0')->first();
        // dd($blog_detail);
        
       return view('blog-detail', compact('blog_detail'));
    }



    public function news_press_release()
    {
       $page = DB::table('pages')->where('id', 4)->first();
       $pressRelease = Newpressrelease::all();

       return view('news-press-release', compact('page', 'pressRelease'));
    }

    public function kyocera_award()
    {
       $page = DB::table('pages')->where('id', 5)->first();
       $Kyoceraaward = Kyoceraaward::all();

       return view('kyocera-award', compact('page', 'Kyoceraaward'));
    }


    public function contact()
    {
       $page = DB::table('pages')->where('id', 6)->first();

       return view('contact', compact('page'));
    }

    public function review()
    {
       $page = DB::table('pages')->where('id', 7)->first();
       $testimonial = Testimonial::all();
       return view('review', compact('page', 'testimonial'));
    }


    public function promotions()
    {
       $page = DB::table('pages')->where('id', 8)->first();
       $promotion = Promotion::all();
       return view('promotions', compact('page', 'promotion'));
    }

    public function business_solution_application()
    {
       $page = DB::table('pages')->where('id', 14)->first();

       return view('business-solution-application', compact('page'));
    }

    public function managed_document_services()
    {
       $page = DB::table('pages')->where('id', 13)->first();

       return view('managed-document-services', compact('page'));
    }

    public function rj_business_services()
    {
       $page = DB::table('pages')->where('id', 12)->first();

       return view('rj-business-services', compact('page'));
    }

    public function download_drivers()
    {
       $page = DB::table('pages')->where('id', 9)->first();

       return view('download-drivers', compact('page'));
    }

    public function order_toner()
    {
       $page = DB::table('pages')->where('id', 10)->first();

       return view('order-toner', compact('page'));
    }

    public function it_solutions()
    {
       $page = DB::table('pages')->where('id', 11)->first();

       return view('it-solutions', compact('page'));
    }

    public function reviews(Request $request){

        Testimonial::create($request->all());

        Session::flash('message', 'Testimonial Added Successfully');
		Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function product_category($id){
        $productArray = [];
        $subcategory = Subcategory::find($id);
        $product = Product::all();
        foreach($product as $value){
            $catArr = json_decode($value->category);
            if (in_array($subcategory->id, $catArr)) {
                $productArray[] = $value->id;
            }
        }
        
        
        $products = Product::whereIn('id', $productArray)->get();
        // dump($products);
        $name = $subcategory->name;
        if($subcategory->id == 5){
        $online_purchased = Product::where('product_type', 1)->get();
        }else{
        $online_purchased = null;
        }
        // dd($subcategory);
        $type = null;
        return view('product-category', compact('products', 'subcategory', 'online_purchased', 'name', 'type'));
    }
    
    public function productFilter(Request $request){
        // dd($request->all());
        $productArray = [];
        $subcategory = Subcategory::find($request->subcat);
        $product = Product::all();
        foreach($product as $value){
            $catArr = json_decode($value->category);
            if (in_array($subcategory->id, $catArr)) {
                $productArray[] = $value->id;
            }
        }
        $type = $request->subcat_type;
        $name = $request->color_type;
        $id = $request->subcat;
        if($request->color_type == 0){
            $online_purchased = Product::whereIn('id', $productArray)->get();
        }else{
           $online_purchased = Product::where('color_type', $request->color_type)->whereIn('id', $productArray)->get(); 
        }
        
        $subcategory = null;
        $products = null;
        // dd($online_purchased);
        return view('product-category', compact('products', 'online_purchased', 'subcategory', 'name', 'id', 'type'));
    }
    
    public function toner_search(){
        
        return view('toner-search');
    }
    
    public function tonerSearch(Request $request){
        $name = $request->toner_type;
        $productArray = [];
        $cat = $request->subcat;
        $subcategory = Subcategory::find($request->subcat);
        $product = Product::all();
        foreach($product as $value){
            $catArr = json_decode($value->category);
            if (in_array($subcategory->id, $catArr)) {
                $productArray[] = $value->id;
            }
        }
        
        
        $products = Product::whereIn('id', $productArray)
                    ->where('product_title', 'LIKE', '%' . $name . '%')
                    ->get();
        // dd($products);
        return view('toner-search', compact('products', 'name', 'cat'));
        
    }
    







    public function careerSubmit(Request $request)
    {


        inquiry::create($request->all());
        $emails = 'sales@rjbmachines.ca';
        $data = [
            'name' => $request->fname,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->last_company,
            'notes' => $request->notes,
            'subject' => $request->form_name,
            'product_name' => $request->product_name,
            'url' => $request->url,
            'model' => $request->model,
            'shipping_address' => $request->shipping_address,
            ];
        $subject = $request->form_name;
        Mail::send('mail',$data, function($message) use ($emails, $subject){
            $message->from(config('services.mail.username'), $request->form_name);
            $message->to($emails)->subject($subject);
        });

        return response()->json(['message'=>'Thank you for contacting us. We will get back to you asap', 'status' => true]);
        return back();
    }

    public function newsletterSubmit(Request $request){

        $is_email = newsletter::where('newsletter_email',$request->newsletter_email)->count();
        if($is_email == 0) {
            $inquiry = new newsletter;
            $inquiry->newsletter_email = $request->newsletter_email;
            $inquiry->save();
            return response()->json(['message'=>'Thank you for contacting us. We will get back to you asap', 'status' => true]);

        }else{
            return response()->json(['message'=>'Email already exists', 'status' => false]);
        }

    }

    public function updateContent(Request $request){
        $id = $request->input('id');
        $keyword = $request->input('keyword');
        $htmlContent = $request->input('htmlContent');
        if($keyword == 'page'){
            $update = DB::table('pages')
                        ->where('id', $id)
                        ->update(array('content' => $htmlContent));

            if($update){
                return response()->json(['message'=>'Content Updated Successfully', 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }else if($keyword == 'section'){
            $update = DB::table('section')
                        ->where('id', $id)
                        ->update(array('value' => $htmlContent));
            if($update){
                return response()->json(['message'=>'Content Updated Successfully', 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }
    }

}
