<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Brand_query;
use App\Models\Influencer_query;
use App\Models\Influencer;
use App\Models\Category;
use App\Models\Platform;
use App\Models\CustomInfluencerPage;
use Storage, Session;


class FrontController extends Controller
{
    //
    public function index(){
        $categories = DB::table('categories')->where('type','normal')->limit(7)->get();
        return view('front.homepage', [ 'title' => 'Influencer Marketing Agency In India', 'categories' => $categories]);
    }


    public function InfluencerCategory()
    {
        $normal_categories = DB::table('categories')->where('type','normal')->get();
        $nano_categories = DB::table('categories')->where('type','nano')->get();
        return view('front.influencers_category', ['title' => 'Most Effective Influencer In India For Collaborations', 'nano_categories' => $nano_categories, 'normal_categories'=>$normal_categories]);
    }

    public function InfluencerList(Request $request, $category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        
        if($category->type == 'normal'){
            $influencers_count = $category->influencers->count();
            $influencers = $category->influencers()->paginate(8);
        }else if($category->type == 'nano'){
            $influencers_count = $category->type_influencers->count();
            $influencers = $category->type_influencers()->paginate(8);
        }
        // echo $influencers->links();
        $meta['meta_title']     = $category->meta_title;
        $meta['meta_desc']      = $category->meta_desc;
        // $meta['meta_tags']      = $blog->tags;
        // $meta['meta_keywords']  = $blog->keywords;

        // $category = DB::table('categories')->where('slug',$category_slug)->first();
       
        // foreach($category->influencers as $influ){
        //      dd($influ);
        // }
        // dd($category->type_influencers->count());

        if ($request->ajax()) {
           
            return response()->view('front.ajax.influencer_list', compact('influencers'));;
        }

        return view('front.influencers_list', ['title' => $category->name, 'category'=>$category, 'influencers_count'=> $influencers_count,'influencers'=>$influencers, 'meta_details' => $meta]);
    }

    public function ForBrand()
    {
        return view('front.for_brand', ['title' => 'Brands -']);
    }

    public function ForBrandStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
                'email'=>'required',
                'name'=>'required',
                'number'=>'required|digits:10',
                'message'=>'required',
                'designation'=>'required',
                'company_name'=>'required',
                'budget'=>'required',
            ]);

        Brand_query::create($request->all());
         $request->session()->flash('success','Your query has been submitted.');
            return redirect()->route('querysubmit.thankyou');
    }

    public function ForInfluencer()
    {
        return view('front.for_influencer', ['title' => 'Influencer -']);
    }

    public function ForInfluencerStore(Request $request)
    {
        // dd($request->all());
         $request->validate([
                'email'=>'required',
                'name'=>'required',
                'number'=>'required|digits:10',
                'w_number'=>'required|digits:10',
                'gender'=>'required',
                'age'=>'required',
                // 'city'=>'required',
                // 'state'=>'required',
            ]);

        Influencer_query::create($request->all());
         $request->session()->flash('success','Your query has been submitted.');
            return redirect()->back();
    }

    public function About()
    {
        return view('front.about', ['title' => 'A leading influencer marketing agency in India - About Us']);
    }

    public function OurWorks()
    {
        return view('front.works', ['title' => 'A leading influencer marketing agency in India - Our Works']);
    }

    public function Contact()
    {
        return view('front.contact', ['title' => "Contact InfuencerHai.com's team for the benefits of influencer marketing"]);
    }

    public function submitContact(Request $request)
    {
        // dd($request->all());
        $request->validate([
                'email'=>'required',
                'name'=>'required',
                'number'=>'required',
                'message'=>'required',
            ]);
        $data=array(
               'name'=>$request['name'],
               'email'=>$request['email'],
               'number'=>$request['number'],
               'message'=>$request['message'],
               'type'=>'contact',
               'created_at'=>date('Y-m-d h:i:s'),
            );
        DB::table('contactus')->insertGetId($data);
        // return view('front.contact', ['title' => 'Contact -']);
        $request->session()->flash('success','Your query has been submitted.');
            return redirect()->back();
    }

    public function Careers()
    {
         $career_jobs=DB::table('career_jobs')->where('status',1)->orderBy('id','desc')->get();
        return view('front.careers', ['title' => "Job Opportunities In India's Emerging Influencer Marketing", 'career_jobs' => $career_jobs]);
    }

    public function CareersApply($title, $id)
    {
        $job =DB::table('career_jobs')->where('id',$id)->first();
        return view('front.careers_apply', ['title' => 'Careers -', 'job'=> $job]);
    }

    public function CareersApplyStore(Request $request, $id)
    {
        // $request->dd();
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'number'=>'required',
                'qualification'=>'required',
                'resume'=>'required|max:10000|mimes:doc,docx,pdf',
                'position'=>'required',
                'reason_to_hire'=>'required'
            ]);
            $data=array(
               'name'=>$request['name'],
               'email'=>$request['email'],
               'number'=>$request['number'],
               'qualification'=>$request['qualification'],
               'position'=>$request['position'],
               'experience'=>$request['experience'],
               'reason_to_hire'=>$request['reason_to_hire'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'resume'=>''
            );
            if($request->hasFile('resume')) //image check Aviable Or | Not
                {
                    
                    $file = $request->file('resume');
                    $imageName=time().$file->getClientOriginalName();
                    $filePath = 'career_jobs_apply/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['resume']=env('AWS_BASEURL_IMAGE').'career_jobs_apply/'.$imageName;
                }
            DB::table('career_jobs_applies')->insert($data);
            $request->session()->flash('success','Your job has been applied.');
            return redirect()->back();
    }

    public function Privacy()
    {
        return view('front.privacy', ['title' => 'Privacy Policy-']);
    }

    public function Terms()
    {
        return view('front.terms', ['title' => 'Terms & Conditions -']);
    }

    public function Blog(Request $request)
    {
        $search='';
        if(isset($request->search)){
            // dd($request->all());
            $blogs=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->where('posts.title','like','%'.$request->search.'%')->orderBy('id', 'desc')
            // ->count();
            ->paginate(8);
            $search= $request->search;
        }else{
            $blogs=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->orderBy('id', 'desc')
            // ->count();
            ->paginate(8);
        }
        
        // if ($request->ajax()) {
           
        //     return response()->view('front.ajax.blogs', compact('blogs'));;
        // }

        return view('front.blog', ['title' => 'Influencer Marketing Daily Blog & Updates - InfluencerHai.com', 'blogs' => $blogs, 'search'=>$search]);
    }

    public function BlogCategory(Request $request, $slug)
    {
        $category=DB::table('post_categories')->where('slug', $slug)->first();
        $blogs=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->where('posts.post_cat_id',$category->id)->orderBy('id', 'desc')->paginate(8);

        $search='';
        if(isset($request->search)){
            // dd($request->all());
            $blogs=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->where('posts.post_cat_id',$category->id)->where('posts.title','like','%'.$request->search.'%')->orderBy('id', 'desc')->paginate(8);
            
            $search= $request->search;
        }else{
           $blogs=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->where('posts.post_cat_id',$category->id)->orderBy('id', 'desc')->paginate(8);
        }

         $meta = [];
        $meta['meta_title']     = $category->meta_title ?? '';
        $meta['meta_desc']      = $category->meta_desc ?? '';
        $meta['meta_tags']      = $category->tags ?? '';
        $meta['meta_keywords']  = $category->keywords ?? '';

      

        return view('front.blog_category', ['title' => 'Influencer Marketing Daily Blog & Updates - InfluencerHai.com', 'category' => $category, 'meta_details' => $meta, 'blogs' => $blogs, 'search'=>$search]);
    }

    

    public function BlogDetails($title)
    {
        $blog=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->where('posts.slug',$title)->first();
        if($blog == null )  return abort(404);

        $recent_blogs=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname',  'post_categories.slug as cslug')->where('posts.slug','!=',$title)->orderBy('id', 'desc')->limit(5)->get();

        $categories=DB::table('post_categories')->orderBy('id', 'desc')->get();

        $meta = [];
        $meta['meta_title']     = $blog->meta_title;
        $meta['meta_desc']      = $blog->meta_desc;
        $meta['meta_tags']      = $blog->tags;
        $meta['meta_keywords']  = $blog->keywords;

        
        return view('front.blog_details', ['title' => $blog->title, 'blog' => $blog, 'meta_details' => $meta, 'categories'=>$categories, 'recent_blogs'=> $recent_blogs]);

    }

    public function PressRelease()
    {
        return view('front.press_release', ['title' => 'Press Release -']);
    }

    public function QuerySubmitThankyou()
    {
        if(Session::has('success')){
            return view('front.brand_thanks', ['title' => 'Thankyou -']);
        }
        return redirect()->route('home');
        
    }

    public function startCampaign()
    {
        return view('front.start_campaign', ['title' => 'Campaign -']);
    }

    public function postCampaign(Request $request)
    {
         // dd($request->all());
        $request->validate([
                'email'=>'required',
                'name'=>'required',
                'phone'=>'required',
                'message'=>'required',
                'website'=>'required',
            ]);
        $data=array(
               'name'=>$request['name'],
               'email'=>$request['email'],
               'number'=>$request['phone'],
               'message'=>$request['message'],
               'website'=>$request['website'],
               'type'=>'landing',
               'created_at'=>date('Y-m-d h:i:s'),
            );
        DB::table('contactus')->insertGetId($data);
        // return view('front.contact', ['title' => 'Contact -']);
        $request->session()->flash('success','Your query has been submitted.');
            return redirect()->route('home');
    }


    public function customPage($slug)
    {
        $page = CustomInfluencerPage::where('slug',$slug)->first();
        if($page == null )  return abort(404);
        $meta = [];
        $meta['meta_title']     = $page->meta_title;
        $meta['meta_desc']      = $page->meta_desc;
        $meta['meta_tags']      = $page->tags;
        $meta['meta_keywords']  = $page->keywords;

        $data = DB::table('custom_influencer_pages')->where('slug','!=' ,$slug)->get();
        $pages = [];
        foreach ($data as $value) {
            // code...
            $pages[]= [$value->slug,$value->title];
        }

        return view('front.custom_page', ['title' => $page->title, 'page' => $page, 'meta_details' => $meta, 'pages' => $pages]);

    }
}
