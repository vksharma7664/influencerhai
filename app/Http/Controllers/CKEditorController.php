<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload'))
            {
                //get filename with extension
                $filenamewithextension = $request->file('upload')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('upload')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                //Upload File
                $request->file('upload')->storeAs('public/uploads', $filenametostore);
                #--------------------------------------#
                if($request->hasFile('upload')) //image check Aviable Or | Not
                    {
                    #-----------------      s3 Image Upload     --------------------#                    
                    $file = $request->file('upload');
                    $imageName=time().$file->getClientOriginalName();
                    $filePath = 'images/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file));
                    $sss3images="https://".env('AWS_BUCKET').".s3.".env('AWS_DEFAULT_REGION').".amazonaws.com/".$filePath;
                    //echo $filePath;
                    //$res->image=$filePath;
                    } 
                #--------------------------------------#
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = $sss3images;
                $msg = 'Image successfully uploaded';
                $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                    
                // Render HTML output
                @header('Content-type: text/html; charset=utf-8');
                echo $re;
            }
    }
}
