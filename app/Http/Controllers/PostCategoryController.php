<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:post-category-list')->only('index', 'show');
        $this->middleware('permission:post-category-create')->only('create', 'store');
        $this->middleware('permission:post-category-edit')->only('edit', 'update');
        $this->middleware('permission:post-category-delete')->only('destroy');
    }

    public function index()
    {
        $title = 'Data Kategori Berita & Artikel';
        $categories = PostCategory::orderBy('id', 'asc')->get();
        return view('backend.posts.category.list', compact('title', 'categories'));
    }

    public function create()
    {
        $title = 'Tambah Data Kategori Berita & Artikel';
        return view('backend.posts.category.create', compact('title'));
    }

    public function store(StorePostCategoryRequest $request)
    {
        $validateData = $request->validated();
        PostCategory::create($validateData);
        return redirect()->route('dashboard.post.category.index')->with('success', 'Data Kategori Berhasil Ditambah');
    }

    public function show(PostCategory $category)
    {
        $title = $category->name;
        $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
        return view('backend.posts.category.show', compact('title', 'category', 'posts'));
    }

    public function edit(PostCategory $category)
    {
        $title = 'Ubah Data Kategori Berita & Artikel';
        return view('backend.posts.category.edit', compact('title', 'category'));
    }

    public function update(UpdatePostCategoryRequest $request, PostCategory $category)
    {
        $validateData = $request->validated();
        PostCategory::where('id', $category->id)->update($validateData);
        return redirect()->route('dashboard.post.category.index')->with('success', 'Data Kategori Berhasil Diubah');
    }

    public function destroy(PostCategory $category)
    {
        $posts = Post::where('category_id', $category->id)->get();
        if ($posts->isNotEmpty()) {
            return back()->with('error', 'Data Kategori Masih Digunakan');
        }
        PostCategory::where('id', $category->id)->delete();
        return redirect()->route('dashboard.post.category.index')->with('success', 'Data Kategori Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(PostCategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
