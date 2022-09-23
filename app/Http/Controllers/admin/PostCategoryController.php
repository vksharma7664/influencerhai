<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Storage;
class PostCategoryController extends Controller
{
    function listing()
        {
            $data['result']=DB::table('post_categories')->get();
            return view('admin/post/add_new_category',$data);
        }
    function submit(Request $request)
        {
            $request->validate([
                'name'=>'required',
                // 'image'=>'required',
                'meta_title'=>'required',
                'meta_desc'=>'required',
            ]);
            $data=array(
               'name'=>$request['name'],
               'slug'=>Str::slug($request['name']),
                'short_desc'=>$request['short_desc'],
                'meta_title'=>$request['meta_title'],
                'meta_desc'=>$request['meta_desc'],
                'tags'=>$request['tags'],
                'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'image'=>'Default_cat.png'
            );
          
            DB::table('post_categories')->insert($data);
            $request->session()->flash('msg','Data Saved Successfully');
            return redirect('admin/post/add-new-category');
        }
    function edit(Request $request,$id)
        {
            $data['result']=DB::table('post_categories')->where('id',$id)->get();
            return view('admin/post/edit_category',$data);
        }
    function update(Request $request,$id)
        {
            $request->validate([
                'name'=>'required',
                'meta_title'=>'required',
                'meta_desc'=>'required',
            ]);
            $data=array(
               'name'=>$request['name'],
               'slug'=>Str::slug($request['name']),
               'short_desc'=>$request['short_desc'],
                'meta_title'=>$request['meta_title'],
                'meta_desc'=>$request['meta_desc'],
                'tags'=>$request['tags'],
                'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
               
            );
           
            DB::table('post_categories')->where('id',$id)->update($data);
            $request->session()->flash('msg','Data Updated Successfully');
            return redirect('admin/post/add-new-category');
        }
    function delete(Request $request,$id)
        {
            // return;
            // DB::table('post_categories')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect('admin/post/add-new-category');
        }
}
