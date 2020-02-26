<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\admin\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = new Banner();
        $banners = $banner->find();

        return view('admin/banner/index', [
            'banners' => $banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/banner/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->title) || empty($request->description) || $_FILES["file"]["error"] != 0) {
            dd("Esta faltando informação para cadastrar banner");
        }

        $name = date("YmdHis");
        $nameImage = $name . $_FILES["file"]["name"];

        move_uploaded_file($_FILES["file"]["tmp_name"], 'upload/banner/'. $nameImage);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;

        $banner->image = $nameImage;

        if (! $banner->save()) {
            return view('admin/banner/add');
        }

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
