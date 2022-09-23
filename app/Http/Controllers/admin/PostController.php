<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Storage;
class PostController extends Controller
{
    function add()
        {
            $data['result']=DB::table('post_categories')->select('id','name')->get();
            return view('admin/post/add',$data);
        }
    function listing()
        {
            $data['result']=DB::table('posts')->join('post_categories', 'posts.post_cat_id', '=', 'post_categories.id') ->select('posts.*', 'post_categories.name as cname')->orderBy('id', 'desc')->get();
            return view('admin/post/list',$data);
        }
    function submit(Request $request)
        {
            $request->validate([
                'post_cat_id'=>'required',
                'title'=>'required|unique:posts,title',
                'image'=>'required',
                'long_desc'=>'required',
                'meta_title'=>'required',
                'meta_desc'=>'required',
            ]);
            $data=array(
               'post_cat_id'=>$request['post_cat_id'],
               'title'=>$request['title'],
               'slug'=>Str::slug(str_replace('- InfluencerHai.com','',$request['title'])),
               'long_desc'=>$request['long_desc'],
                'meta_title'=>$request['meta_title'],
                'meta_desc'=>$request['meta_desc'],
                'tags'=>$request['tags'],
                'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
               'created_at'=>date('Y-m-d h:i:s'),
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
                    $filePath = 'blog/post/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']= 'blog/post/'.$imageName;
                }
            $insert_id = DB::table('posts')->insertGetId($data);
            $request->session()->flash('msg','Data Saved Successfully');
            // return redirect('admin/post/list');
            return redirect()->route('post.edit',$insert_id);
        }
    function delete(Request $request,$id)
        {
            DB::table('posts')->where('id',$id)->delete();
            $request->session()->flash('msg','Data Deleted Successfully');
            return redirect('admin/post/list');
        }
    function edit(Request $request,$id)
        {
            $data['result']=DB::table('posts')->where('id',$id)->get();
            $data2['result2']=DB::table('post_categories')->select('id','name')->get();
            $request->session()->flash('msg','Data Deleted Successfully');
            return view('admin/post/edit',$data,$data2);
        }
    function update(Request $request,$id)
        {
            $request->validate([
                'post_cat_id'=>'required',
                'title'=>'required|unique:posts,title,'.$id,
                'long_desc'=>'required',
                'meta_title'=>'required',
                'meta_desc'=>'required',
            ]);
            $data=array(
                'post_cat_id'=>$request['post_cat_id'],
               'title'=>$request['title'],
               'slug'=>Str::slug(str_replace('- InfluencerHai.com','',$request['title'])),
               'long_desc'=>$request['long_desc'],
                'meta_title'=>$request['meta_title'],
                'meta_desc'=>$request['meta_desc'],
                'tags'=>$request['tags'],
                'keywords'=>$request['keywords'],
               'updated_at'=>date('Y-m-d h:i:s'),
            );
            if($request->hasFile('image')) //image check Aviable Or | Not
                {
                    // $image=$request->file('image');
                    // $ext=$image->extension();
                    // $file=$image->getClientOriginalName().'.'.$ext;
                    // $image->storeAs('/public/post',$file);// not used
                    // $image->move(public_path().'/uploads/blog/post',$file);
                    // $data['image']=$file;

                    $file = $request->file('image');
                    $imageName=$file->getClientOriginalName();
                    $filePath = 'blog/post/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $data['image']= 'blog/post/'.$imageName;
                }
            DB::table('posts')->where('id',$id)->update($data);
            $request->session()->flash('msg','Data Updated Successfully');
            // return redirect('admin/post/list');
             return redirect()->route('post.edit',$id);
        }
}
