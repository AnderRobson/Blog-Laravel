<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\admin\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
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
        $publication = new Publication();
        $publications = $publication->find();

        return view('admin/publication/index', [
            'publications' => $publications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/publication/add');
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

        move_uploaded_file($_FILES["file"]["tmp_name"], 'upload/publication/'. $nameImage);

        $publication = new Publication();
        $publication->title = $request->title;
        $publication->description = $request->description;

        $publication->image = $nameImage;

        if (! $publication->save()) {
            return view('admin/publication/add');
        }

        return redirect()->route('publication.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
