<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryCategoryRequest;
use App\Http\Requests\UpdateGalleryCategoryRequest;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-category-list')->only('index', 'show');
        $this->middleware('permission:gallery-category-create')->only('create', 'store');
        $this->middleware('permission:gallery-category-edit')->only('edit', 'update');
        $this->middleware('permission:gallery-category-delete')->only('destroy');
    }

    public function index()
    {
        $title = 'Data Kategori Galeri Foto';
        $categories = GalleryCategory::orderBy('id', 'asc')->get();
        return view('backend.galleries.category.list', compact('title', 'categories'));
    }

    public function create()
    {
        $title = 'Tambah Data Kategori Galeri Foto';
        return view('backend.galleries.category.create', compact('title'));
    }

    public function store(StoreGalleryCategoryRequest $request)
    {
        $validateData = $request->validated();
        GalleryCategory::create($validateData);
        return redirect()->route('dashboard.gallery.category.index')->with('success', 'Data Kategori Berhasil Ditambah');
    }

    public function show(GalleryCategory $category)
    {
        $title = $category->name;
        $galleries = Gallery::where('category_id', $category->id)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        return view('backend.galleries.category.show', compact('title', 'category', 'galleries'));
    }

    public function edit(GalleryCategory $category)
    {
        $title = 'Ubah Data Kategori Galeri Foto';
        return view('backend.galleries.category.edit', compact('title', 'category'));
    }

    public function update(UpdateGalleryCategoryRequest $request, GalleryCategory $category)
    {
        $validateData = $request->validated();
        GalleryCategory::where('id', $category->id)->update($validateData);
        return redirect()->route('dashboard.gallery.category.index')->with('success', 'Data Kategori Berhasil Diubah');
    }

    public function destroy(GalleryCategory $category)
    {
        $galleries = Gallery::where('category_id', $category->id)->get();
        if ($galleries->isNotEmpty()) {
            return back()->with('error', 'Data Kategori Masih Digunakan');
        }
        GalleryCategory::where('id', $category->id)->delete();
        return redirect()->route('dashboard.gallery.category.index')->with('success', 'Data Kategori Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(GalleryCategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
