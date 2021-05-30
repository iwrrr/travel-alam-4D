<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToolImageRequest;
use App\Http\Requests\ToolRequest;
use App\Models\Category;
use App\Models\Tool;
use App\Models\ToolImage;
use Illuminate\Http\Request;

use Str;
use Session;

class ToolController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'peralatan';
        $this->data['currentAdminSubMenu'] = 'alat';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['tools'] = Tool::all();

        return view('admin.peralatan.alat.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tools = Tool::all();
        $categories = Category::pluck('kategori', 'id');

        $this->data['tools'] = $tools;
        $this->data['toolID'] = 0;
        $this->data['categories'] = $categories;

        return view('admin.peralatan.alat.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToolRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['alat']);

        if (Tool::create($params)) {
            Session::flash('success', 'Alat telah ditambahkan');
        }

        return redirect('admin/peralatan/alat');
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
        $tool = Tool::findOrFail($id);
        $categories = Category::pluck('kategori', 'id');

        $this->data['tool'] = $tool;
        $this->data['toolID'] = $tool->id;
        $this->data['categories'] = $categories;

        return view('admin.peralatan.alat.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ToolRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['alat']);

        $tool = Tool::findOrFail($id);

        if ($tool->update($params)) {
            Session::flash('success', 'Alat telah diperbaharui');
        }

        return redirect('admin/peralatan/alat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);

        if ($tool->delete()) {
            Session::flash('success', 'Alat berhasil dihapus');
        }

        return redirect('admin/peralatan/alat');
    }

    public function images($id)
    {
        $tool = Tool::findOrFail($id);

        $this->data['toolID'] = $tool->id;
        $this->data['toolImages'] = $tool->toolImages;

        return view('admin.peralatan.alat.images', $this->data);
    }

    public function add_image($id)
    {
        $tool = Tool::findOrFail($id);

        $this->data['toolID'] = $tool->id;
        $this->data['tool'] = $tool;

        return view('admin.peralatan.alat.image_form', $this->data);
    }

    public function upload_image(ToolImageRequest $request, $id)
    {
        $tool = Tool::findOrFail($id);

        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $tool->slug . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = '/uploads/tools/images';
            $filePath = $image->storeAs($folder, $fileName, 'public');

            $params = [
                'tool_id' => $tool->id,
                'path' => $filePath,
            ];

            if (ToolImage::create($params)) {
                Session::flash('success', 'Gambar berhasil diunggah');
            } else {
                Session::flash('error', 'Gambar gagal diunggah');
            }

            return redirect('admin/peralatan/alat/' . $id . '/gambar');
        }
    }

    public function remove_image($id)
    {
        $image = toolImage::findOrFail($id);

        if ($image->delete()) {
            Session::flash('success', 'Gambar telah dihapus');
        }

        return redirect('admin/peralatan/alat/' . $image->tool->id . '/gambar');
    }
}
