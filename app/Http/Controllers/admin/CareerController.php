<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class CareerController extends Controller
{
    function listing()
        {
            $data['career_jobs']=DB::table('career_jobs')->orderBy('id','desc')->get();
            return view('admin.careers.job_list',$data);
        }

    function jobApplylisting()
    {
        $data['career_jobs_applies']=DB::table('career_jobs_applies')->orderBy('id', 'desc')->get();
       
        return view('admin.careers.job_applied_list',$data);
    }

    function add()
        {
            return view('admin.careers.job_add');
        }
    function submit(Request $request)
        {
            // $request->dd();
            $request->validate([
                'title'=>'required',
                'image'=>'required',
                'location'=>'required',
                'experience'=>'required',
                'short_desc'=>'required',
            ]);
            $data=array(
               'title'=>$request['title'],
               'short_desc'=>$request['short_desc'],
               'location'=>$request['location'],
               'experience'=>$request['experience'],
               'status'=>$request['status'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
               'image'=>'Default.png'
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=time().'.'.$ext;
                    // $image->storeAs('/public/post',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=time().$file->getClientOriginalName();
                    $filePath = 'career_jobs/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']=env('AWS_BASEURL_IMAGE').'career_jobs/'.$imageName;
                }
            DB::table('career_jobs')->insert($data);
            $request->session()->flash('msg','Data Saved Successfully');
            return redirect()->route('jobs.index');
        }
    function edit(Request $request,$id)
        {
            $data['result']=DB::table('career_jobs')->where('id',$id)->first();
            return view('admin.careers.job_edit',$data);
        }
    function update(Request $request,$id)
        {
            $request->validate([
               'title'=>'required',
                // 'image'=>'required',
                'location'=>'required',
                'experience'=>'required',
                'short_desc'=>'required',
            ]);
            $data=array(
               'title'=>$request['title'],
               'short_desc'=>$request['short_desc'],
               'location'=>$request['location'],
               'experience'=>$request['experience'],
               'status'=>$request['status'],
               'updated_at'=>date('Y-m-d h:i:s'),
               
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=time().'.'.$ext;
                    // $image->storeAs('/public/post',$file);
                    // $data['image']=$file;
                    $file = $request->file('image');
                    $imageName=time().$file->getClientOriginalName();
                    $filePath = 'career_jobs/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']=env('AWS_BASEURL_IMAGE').'career_jobs/'.$imageName;
                }
            DB::table('career_jobs')->where('id',$id)->update($data);
            $request->session()->flash('msg','Data Updated Successfully');
            return redirect()->route('jobs.index');
        }
    function delete(Request $request,$id)
        {
            // DB::table('categories')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect()->route('jobs.index');;
        }
}
