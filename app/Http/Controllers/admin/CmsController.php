<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomInfluencerPage;
use App\Models\Influencer;
use Illuminate\Support\Str;
use Storage, auth;
class CmsController extends Controller
{
   
    function contactQuerieslisting()
        {
            $data['contactqueries']=DB::table('contactus')->orderBy('id', 'desc')->get();
           
            return view('admin/queries/contactus',$data);
        }

    function brandsQuerieslisting()
    {
        $data['brand_queries']=DB::table('brand_queries')->orderBy('id', 'desc')->get();
       
        return view('admin/queries/brands',$data);
    }

    function influencersQuerieslisting()
    {
        $data['influencer_queries']=DB::table('influencer_queries')->orderBy('id', 'desc')->get();
       
        return view('admin/queries/influencers',$data);
    }




    public function customInfluencersPages()
    {
        $data['result']=CustomInfluencerPage::orderBy('id', 'desc')->get();
       
        return view('admin/custom_influencers_pages/list',$data);
    }

    public function customInfluencersList($id)
    {
        $data['result']=CustomInfluencerPage::where('id', $id)->first();
        return view('admin/custom_influencers_pages/show_influe_list',$data);
    }

     public function customInfluencersPagesCreate()
    {
        $data['influencers']=Influencer::orderBy('id', 'desc')->get();
       
        return view('admin/custom_influencers_pages/add',$data);
    }

     public function customInfluencersPagesStore(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:custom_influencer_pages,title',
            'long_desc'=>'required',
            'meta_title'=>'required',
            'meta_desc'=>'required',
            'influencer_list'=>'required'
        ]);

          $data=array(
               'title'=>$request['title'],
               'long_desc'=>$request['long_desc'],
               'slug'=>Str::slug($request['title']),
               'meta_title'=>$request['meta_title'],
               'meta_desc'=>$request['meta_desc'],
               'tags'=>$request['tags'],
               'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'created_by'=>auth::user()->id,
            );

           $insert_id = DB::table('custom_influencer_pages')->insertGetId($data);
            foreach($request['influencer_list'] as $influe){
                
                DB::table('custom_influencer_pages_influencers')->insert([
                    'influencer_id' => $influe,
                    'custom_influencer_page_id'  => $insert_id,
                ]);
                
            }
        $request->session()->flash('msg','Data Saved Successfully');
            // return redirect('admin/influencers/list');
         return redirect()->route('admin.custom.influencers.pages.edit',$insert_id);
    }

     public function customInfluencersPagesEdit($id)
    {
        $data['page']=DB::table('custom_influencer_pages')->where('id', $id)->first();
        $data['influencers']=Influencer::orderBy('id', 'desc')->get();
        $influencers = DB::table('custom_influencer_pages_influencers')->where('custom_influencer_page_id', $id)->get();
        $influencers_list= [];
        foreach ($influencers as $value) {
           $influencers_list[] = $value->influencer_id;
        }
        $data['influencer_list'] = $influencers_list;
        // dd($data['influencer_list']);
        return view('admin/custom_influencers_pages/edit',$data);
    }  

    public function customInfluencersPagesUpdate(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|unique:custom_influencer_pages,title,'.$id,
            'long_desc'=>'required',
            'meta_title'=>'required',
            'meta_desc'=>'required',
            'influencer_list'=>'required'
        ]);
        $data=array(
           'title'=>$request['title'],
           'long_desc'=>$request['long_desc'],
           'slug'=>Str::slug($request['title']),
           'meta_title'=>$request['meta_title'],
           'meta_desc'=>$request['meta_desc'],
           'tags'=>$request['tags'],
           'keywords'=>$request['keywords'],
           'updated_at'=>date('Y-m-d h:i:s'),
           'created_by'=>auth::user()->id,
        );

          DB::table('custom_influencer_pages')->where('id',$id)->update($data);
            DB::table('custom_influencer_pages_influencers')->where('custom_influencer_page_id',$id)->delete();
            foreach($request['influencer_list'] as $influe){
                
                DB::table('custom_influencer_pages_influencers')->insert([
                    'influencer_id' => $influe,
                    'custom_influencer_page_id'  => $id,
                ]);
                
            }
        $request->session()->flash('msg','Data Edit Successfully');
            // return redirect('admin/influencers/list');
         return redirect()->route('admin.custom.influencers.pages.edit',$id);
    }  

     function customInfluencersPagesDelete(Request $request,$id)
        {
            DB::table('custom_influencer_pages')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect()->route('admin.custom.influencers.pages.show');
        } 
  
}
