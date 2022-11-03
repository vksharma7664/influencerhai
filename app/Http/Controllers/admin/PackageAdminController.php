<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForPackage;
use App\Models\PackageValueArea;
use App\Models\PackageInclude;
use App\Models\Package;
use App\Models\PackageValue;

class PackageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('id','desc')->get();
        // dd($packages->pkgfor);
        return view('admin.packages.list', compact('packages'));
    }

    public function pkgDetails($id)
    {
        $pkg_values = PackageValue::all();
        $package = Package::where('id',$id)->first();
        $pkg_includes = [];
        foreach ($package->values as $include) {
            
            $pkg_includes[$include->pivot->package_value_id] = $include->pivot->display_text;
        }
            // dd($pkg_includes);

        return view('admin.packages.values.list', compact('package', 'pkg_values', 'pkg_includes'));
    }

    public function pkgDetailsUpdate(Request $request, $id)
    {
        // $request->dd();
        $pkg_values = PackageValue::all();
        // delete package includes
        PackageInclude::where('package_id', $id)->delete();
        $input = $request->all();
        foreach ($pkg_values as $val) {
            if(array_key_exists('selected_'.$val->id, $input)){
                PackageInclude::create([
                    'package_id'        => $id,
                    'package_value_id'  => $val->id,
                    'display_text'      => $input['display_text_'.$val->id],
                    'exist'             => 1,
                ]);
            }
        }

        $request->session()->flash('msg','Data Saved Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fpkg = ForPackage::orderBy('id','desc')->get();
        // dd($packages->pkgfor);
        return view('admin.packages.add', compact('fpkg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'for_package_id'=>'required',
            'title'=>'required|unique:packages,title',
            'price_flag'=>'required',
        ]);
        // $request->dd();
        Package::create($request->all());
        // "for_package_id"    => $request['for_package_id'],
        // "title"             => $request['title'],
        // "short_desc"        => $request['short_desc'],
        // "long_desc"         => $request['long_desc'],
        // "price_flag"        => $request['price_flag'],
        // "monthly"           => $request['monthly'],
        // "quarterly"         => $request['quarterly'],
        // "yearly"            => $request['yearly'],
        // "status"            => $request['status'],
        $request->session()->flash('msg','Data Saved Successfully');
        return redirect()->route('admin.package.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fpkg = ForPackage::orderBy('id','desc')->get();
        $package = Package::where('id',$id)->first();
        // dd($packages->pkgfor);
        // dd($package->price_flag);
        return view('admin.packages.edit', compact('fpkg', 'package'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'for_package_id'=>'required',
            'title'=>'required|unique:packages,title,'.$id,
            'price_flag'=>'required',
        ]);
        // $request->dd();
        Package::where('id',$id)->update($request->except(['_token','btn_submit']));

        $request->session()->flash('msg','Data Saved Successfully');
        return redirect()->route('admin.package.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
