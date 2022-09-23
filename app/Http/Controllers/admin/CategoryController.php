<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Storage;
class CategoryController extends Controller
{
    function listing()
        {
            $data['result']=DB::table('categories')->get();
            return view('admin/influencers/add_new_category',$data);
        }
    function submit(Request $request)
        {
            $request->validate([
                'name'=>'required',
                'image'=>'required',
                'type'=>'required',
                // 'sort_desc'=>'required',
                // 'long_desc'=>'required',
                // 'meta_title'=>'required',
                // 'meta_desc'=>'required',
                // 'seo_url'=>'required'
            ]);

            // dd($request->all());

            $data=array(
               'name'=>$request['name'],
               'type'=>$request['type'],
               'sort_desc'=>$request['sort_desc'],
               'long_desc'=>$request['long_desc'],
               'meta_title'=>$request['meta_title'],
               'meta_desc'=>$request['meta_desc'],
               'slug'=>Str::slug($request['name']),
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'image'=>'Default_cat.png'
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                   //$image=$request->file('image')->store('public/post'); method 1
                    
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // // $image->storeAs('/public/blog/post',$file); // not used
                    // $image->move(public_path().'/uploads/influencers_categories',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=$file->getClientOriginalName();
                    $filePath = 'influencers_categories/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']='influencers_categories/'.$imageName;
                }
           $insert_id = DB::table('categories')->insertGetId($data);
            $request->session()->flash('msg','Data Saved Successfully');
            // return redirect('admin/influencers/add-new-category');
            return redirect()->route('influencer.cat.edit',$insert_id);
        }
    function edit(Request $request,$id)
        {
            $data['result']=DB::table('categories')->where('id',$id)->get();
            return view('admin/influencers/edit_category',$data);
        }
    function update(Request $request,$id)
        {
            $request->validate([
                'name'=>'required',
                'type'=>'required',
                // 'sort_desc'=>'required',
                // 'long_desc'=>'required',
                // 'meta_title'=>'required',
                // 'meta_desc'=>'required',
                // 'short_desc'=>'required',
                // 'seo_url'=>'required'
            ]);
            $data=array(
               'name'=>$request['name'],
               'type'=>$request['type'],
               'sort_desc'=>$request['sort_desc'],
               'long_desc'=>$request['long_desc'],
               'meta_title'=>$request['meta_title'],
               'slug'=>Str::slug($request['name']),
               'meta_desc'=>$request['meta_desc'],
               'updated_at'=>date('Y-m-d h:i:s'),
               
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                    //$image=$request->file('image')->store('public/post'); method 1
                    
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // // $image->storeAs('/public/blog/post',$file); // not used
                    // $image->move(public_path().'/uploads/influencers_categories',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=$file->getClientOriginalName();
                    $filePath = 'influencers_categories/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']='influencers_categories/'.$imageName;
                }
            DB::table('categories')->where('id',$id)->update($data);
            $request->session()->flash('msg','Data Updated Successfully');
            // return redirect('admin/influencers/add-new-category');
            return redirect()->route('influencer.cat.edit',$id);
        }
    function delete(Request $request,$id)
        {
            // DB::table('categories')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect('admin/influencers/add-new-category');
        }
}
