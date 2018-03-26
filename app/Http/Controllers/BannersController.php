<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpParser\Node\Stmt\Echo_;
use Session;

class BannersController extends Controller
{
    public function index(){
        //fetch all banners data
        $banners = Banner::orderBy('created_at','desc')->get();

        //pass posts data to view and load list view
        return view('banners.index', ['banners' => $banners]);
    }

    public function details($id){
        //fetch banner data
        $banner = Banner::find($id);

        //pass posts data to view and load list view
        return view('banners.details', ['banner' => $banner]);
    }

    public function add(){
        //load form view
        return view('banners.add');
    }

    public function insert(Request $request){
        //validate banner data
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $input['imageName'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $image->move($destinationPath, $input['imageName']);

        //get banner data
        $bannerData = $request->all();
        unset($bannerData['image']);
        $bannerData['imagePath'] = $input['imageName'];

        //insert banner data
        Banner::create($bannerData);

        //store status message
        Session::flash('success_msg', 'Banner added successfully!');

        return redirect()->route('banners.index');
    }

    public function edit($id){
        //get banner data by id
        $banner = Banner::find($id);

        //load form view
        return view('banners.edit', ['banner' => $banner]);
    }

    public function update($id, Request $request){
        //validate banner data
        $this->validate($request, [
            'name' => 'required',
            'imagePath' => 'required'
        ]);

        //get banner data
        $bannerData = $request->all();

        //update post data
        Banner::find($id)->update($bannerData);

        //store status message
        Session::flash('success_msg', 'Banner updated successfully!');

        return redirect()->route('banners.index');
    }

    public function delete($id){
        //update banner data
        Banner::find($id)->delete();

        //store status message
        Session::flash('success_msg', 'Banner deleted successfully!');

        return redirect()->route('banners.index');
    }

}