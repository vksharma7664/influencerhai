<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetaController extends Controller
{
    private $route_pages = [
        'home'          => 'Homepage',
        'brand'         => 'I am Brand',
        'influencer'    => 'I am an Influencer',
        'about'         => 'About',
        'contact'       => 'Contact',
        'careers'       => 'Career',
        'blog'          => 'blog',
        'category'      => 'Category',
        'ourworks'      => 'Our Works',
    ];

    function add()
        {
            $data['pages'] = $this->route_pages;
            return view('admin/meta/add',$data);
        }
    function listing()
        {
            $data['result']=DB::table('seo_details')->orderBy('id', 'desc')->get();
            $data['pages'] = $this->route_pages;
            return view('admin/meta/list',$data);
        }
    function submit(Request $request)
        {

            $exist = DB::table('seo_details')->where('route',$request['route']);
            if($exist->count() != 0){
                $request->session()->flash('msg','Page data already exist!');
                return redirect()->route('meta.edit',$exist->first()->id);
            }
            $data=array(
               'route'=>$request['route'],
               'title'=>$request['title'],
                'desc'=>$request['desc'],
                'tags'=>$request['tags'],
                'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
            );
            
            $id = DB::table('seo_details')->insertGetId($data);
            $request->session()->flash('msg','Data Saved Successfully');
            // return redirect('admin/meta/list');
            return redirect()->route('meta.edit',$id);
        }
    function delete(Request $request,$id)
        {
            DB::table('posts')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect('admin/meta/list');
        }
    function edit(Request $request,$id)
        {
            $data['result']=DB::table('seo_details')->where('id',$id)->get();
             $data['pages'] = $this->route_pages;
            $request->session()->flash('msg','Data Deleted Successfully');
            return view('admin/meta/edit',$data);
        }
    function update(Request $request,$id)
        {
           
            $data=array(
                'title'=>$request['title'],
                'desc'=>$request['desc'],
                'tags'=>$request['tags'],
                'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
            );
            DB::table('seo_details')->where('id',$id)->update($data);
            $request->session()->flash('msg','Data Updated Successfully');
            // return redirect('admin/meta/list');
            return redirect()->route('meta.edit',$id);
        }
}
