<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToolRequest;
use App\Models\Category;
use App\Models\Tool;
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
        $this->data['tools'] = Tool::with('category')->paginate(2);

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
}
