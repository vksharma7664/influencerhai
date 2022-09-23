<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class PlatformController extends Controller
{
    function listing()
        {
            $data['result']=DB::table('platforms')->get();
            return view('admin/influencers/add_new_platform',$data);
        }
    function submit(Request $request)
        {

            // dd($request->all());
            $request->validate([
                'name'=>'required',
                'image'=>'required',
                // 'short_desc'=>'required',
                // 'seo_url'=>'required'
            ]);

            $data=array(
               'name'=>$request['name'],
               'short_desc'=>$request['short_desc'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'image'=>'default_platform.png'
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                   //$image=$request->file('image')->store('public/post'); method 1
                    
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // // $image->storeAs('/public/blog/post',$file); // not used
                    // $image->move(public_path().'/uploads/platforms',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=time().$file->getClientOriginalName();
                    $filePath = 'platforms/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']='platforms/'.$imageName;
                }
            DB::table('platforms')->insert($data);
            $request->session()->flash('msg','Data Saved Successfully');
            return redirect('admin/influencers/add-new-platform');
        }
    function edit(Request $request,$id)
        {
            $data['result']=DB::table('platforms')->where('id',$id)->get();
            return view('admin/influencers/edit_platform',$data);
        }
    function update(Request $request,$id)
        {
            $request->validate([
                'name'=>'required',
                
                // 'short_desc'=>'required',
                // 'seo_url'=>'required'
            ]);
            $data=array(
               'name'=>$request['name'],
               
               'updated_at'=>date('Y-m-d h:i:s')
               
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                    //$image=$request->file('image')->store('public/post'); method 1
                    
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // // $image->storeAs('/public/blog/post',$file); // not used
                    // $image->move(public_path().'/uploads/platforms',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=time().$file->getClientOriginalName();
                    $filePath = 'platforms/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']='platforms/'.$imageName;
                }
            DB::table('platforms')->where('id',$id)->update($data);
            $request->session()->flash('msg','Data Updated Successfully');
            return redirect('admin/influencers/add-new-platform');
        }
    function delete(Request $request,$id)
        {
            // exit();
            // DB::table('platforms')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect('admin/influencers/add-new-platform');
        }
}
