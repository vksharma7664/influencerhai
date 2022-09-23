<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Influencer;
use Storage, auth;
class InfluencerController extends Controller
{
    function add()
        {
            $data['platform']=DB::table('platforms')->get();
            $data['categories']=DB::table('categories')->where('type','normal')->get();
            $data['type']=DB::table('categories')->where('type','nano')->get();
            // $data['type']=DB::table('influencer_reach_type')->get();
            return view('admin/influencers/add',$data);
        }
    function listing()
        {
            // $data['influencers']=DB::table('influencers')->join('influencer_reach_type', 'influencer_reach_type.id', '=', 'influencers.type')->select('influencers.*','influencer_reach_type.name as type_name')->orderBy('id', 'desc')->get();
            // ->join('influencers_plateforms', 'influencers.id', '=', 'influencers_plateforms.influencer_id')->join('influencers_categories', 'influencers.id', '=', 'influencers_categories.influencer_id') 
           $data['platforms']=DB::table('platforms')->get();
            // $data['categories']=DB::table('influencers_categories')->join('categories', 'categories.id', '=', 'influencers_categories.category_id')->select('influencers_categories.*','categories.name')->get();
            $data['influencers'] = Influencer::orderBy('id','desc')->get();
            return view('admin/influencers/list',$data);
        }
    function submit(Request $request)
        {
            // dd($request->all());
            $request->validate([
                'email'=>'required|unique:influencers,email',
                'name'=>'required',
                'username'=>'required|unique:influencers,username',
                'image'=>'required',
                'gender'=>'required',
                'meta_title'=>'required',
                'meta_desc'=>'required',
            ]);
            $data=array(
               'name'=>$request['name'],
               'email'=>$request['email'],
               'username'=>$request['username'],
               'number'=>$request['number'],
               'city'=>$request['city'],
               'state'=>$request['state'],
               'gender'=>$request['gender'],
               'followers'=>$request['followers'],
               'likes_avg'=>$request['likes_avg'],
               'subscribers'=>$request['subscribers'],
               'type'=>$request['type'],
               'country'=>'India',
               'meta_title'=>$request['meta_title'],
               'meta_desc'=>$request['meta_desc'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'created_by'=>auth::user()->id,
               'image'=>'Default.png'
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                    //$image=$request->file('image')->store('public/post'); method 1
                    
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // // $image->storeAs('/public/blog/post',$file); // not used
                    // $image->move(public_path().'/uploads/blog/post',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=$file->getClientOriginalName();
                    $filePath = 'influencers/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']='influencers/'.$imageName;
                }
            $insert_id = DB::table('influencers')->insertGetId($data);

            // insert links & cat-id
            $platform =DB::table('platforms')->get();
            // $categories =DB::table('categories')->get();

            foreach($platform as $plat){
                $input_channel = 'channel_link_'.$plat->id;
                DB::table('influencers_platforms')->insert([
                    'influencer_id' => $insert_id,
                    'platform_id'  => $plat->id,
                    'channel_link'          => $request[$input_channel]
                ]);
                
            }

            foreach($request['categories'] as $cat){
                DB::table('influencers_categories')->insert([
                    'influencer_id' => $insert_id,
                    'category_id'  => $cat,
                ]);
                
            }

            // 

            $request->session()->flash('msg','Data Saved Successfully');
            // return redirect('admin/influencers/list');
            return redirect()->route('influencer.edit',$insert_id);
        }
    function delete(Request $request,$id)
        {
            DB::table('influencers')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect('admin/influencers/list');
        }
    function edit(Request $request,$id)
        {
             $data['result']=DB::table('influencers')->where('id',$id)->get();
            $data['platforms']=DB::table('platforms')->get();
            $data['categories']=DB::table('categories')->where('type','normal')->get();
            $data['type']=DB::table('categories')->where('type','nano')->get();
            $data['influencers_platforms'] = DB::table('influencers_platforms')->join('platforms', 'platforms.id', '=', 'influencers_platforms.platform_id')->select('influencers_platforms.*','platforms.name')->where('influencers_platforms.influencer_id',$id)->get();
            $data['influencers_categories']=array_column( DB::table('influencers_categories')->where('influencer_id',$id)->get()->toArray(),'category_id');
            // dd($data['influencers_categories']);
            // $request->session()->flash('msg','Data Deleted Successfully');
            return view('admin/influencers/edit',$data);
        }
    function update(Request $request,$id)
        {
           $request->validate([
                'email'=>'required|unique:influencers,email,'.$id,
                'name'=>'required',
                'username'=>'required|unique:influencers,username,'.$id,
                // 'image'=>'required',
                'gender'=>'required',
                'meta_title'=>'required',
                'meta_desc'=>'required',
            ]);
            $data=array(
               'name'=>$request['name'],
               'email'=>$request['email'],
               'username'=>$request['username'],
               'number'=>$request['number'],
               'city'=>$request['city'],
               'state'=>$request['state'],
               'gender'=>$request['gender'],
               'followers'=>$request['followers'],
               'likes_avg'=>$request['likes_avg'],
               'subscribers'=>$request['subscribers'],
               'type'=>$request['type'],
               'country'=>'India',
               'meta_title'=>$request['meta_title'],
               'meta_desc'=>$request['meta_desc'],
               'updated_at'=>date('Y-m-d h:i:s'),
               // 'created_at'=>date('Y-m-d h:i:s'),
               'created_by'=>auth::user()->id,
               // 'image'=>'Default.png'
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                   //$image=$request->file('image')->store('public/post'); method 1
                    
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // // $image->storeAs('/public/blog/post',$file); // not used
                    // $image->move(public_path().'/uploads/blog/post',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=$file->getClientOriginalName();
                    $filePath = 'influencers/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']='influencers/'.$imageName;;
                }
             DB::table('influencers')->where('id',$id)->update($data);

            // insert links & cat-id
            $platform =DB::table('platforms')->get();
            // $categories =DB::table('categories')->get();
            DB::table('influencers_platforms')->where('influencer_id',$id)->delete();
            DB::table('influencers_categories')->where('influencer_id',$id)->delete();
            foreach($platform as $plat){
                $input_channel = 'channel_link_'.$plat->id;
                DB::table('influencers_platforms')->insert([
                    'influencer_id' => $id,
                    'platform_id'  => $plat->id,
                    'channel_link'          => $request[$input_channel]
                ]);
                
            }

            foreach($request['categories'] as $cat){
                DB::table('influencers_categories')->insert([
                    'influencer_id' => $id,
                    'category_id'  => $cat,
                ]);
                
            }
            $request->session()->flash('msg','Data Updated Successfully');
            // return redirect('admin/influencers/list');
            return redirect()->route('influencer.edit',$id);
            
        }
}
