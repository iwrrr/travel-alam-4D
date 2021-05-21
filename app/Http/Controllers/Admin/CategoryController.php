<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use Str;
use Session;

class CategoryController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'peralatan';
        $this->data['currentAdminSubMenu'] = 'kategori';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::orderBy('kategori', 'ASC')->paginate(10);

        return view('admin.peralatan.kategori.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('kategori', 'ASC')->get();

        $this->data['categories'] = $categories->toArray();
        $this->data['category'] = null;

        return view('admin.peralatan.kategori.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['kategori']);

        if (Category::create($params)) {
            Session::flash('success', 'Kategori telah ditambahkan');
        }

        return redirect('admin/peralatan/kategori');
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
        $category = Category::findOrFail($id);

        $this->data['category'] = $category;

        return view('admin.peralatan.kategori.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['kategori']);

        $category = Category::findOrFail($id);

        if ($category->update($params)) {
            Session::flash('success', 'Kategori telah diperbaharui.');
        }

        return redirect('admin/peralatan/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            Session::flash('success', 'Kategori berhasil dihapus');
        }

        return redirect('admin/peralatan/kategori');
    }
}
