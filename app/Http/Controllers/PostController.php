<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:post-list')->only('index', 'show');
        $this->middleware('permission:post-create')->only('create', 'store');
        $this->middleware('permission:post-edit')->only('edit', 'update');
        $this->middleware('permission:post-delete')->only('delete');
        $this->middleware('permission:post-deleted')->only('deleted', 'restore', 'restoreAll', 'deletePermanent', 'deletePermanentAll');
        $this->middleware('permission:post-publish')->only('publish', 'notPublish');
    }

    public function index()
    {
        $title = 'Data Berita & Artikel';
        if (auth()->user()->hasRole('Author')) {
            $posts = Post::where('create_by', auth()->user()->id)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
            $np_posts = Post::where('create_by', auth()->user()->id)->where('isPublish', 0)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
            $p_posts = Post::where('create_by', auth()->user()->id)->where('isPublish', 1)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
        } else {
            $posts = Post::orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
            $np_posts = Post::where('isPublish', 0)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
            $p_posts = Post::where('isPublish', 1)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
        }
        return view('backend.posts.list', compact('title', 'posts', 'np_posts', 'p_posts'));
    }

    public function create()
    {
        $title = 'Tambah Data Berita & Artikel';
        $categories = PostCategory::orderBy('slug', 'asc')->get();
        return view('backend.posts.create', compact('title', 'categories'));
    }

    public function store(StorePostRequest $request)
    {
        $validateData = $request->validated();
        // $validateData['title'] = Str::title($validateData['title']);

        $name = Str::random(20) . '.' . $request->file('image')->extension();
        $request->file('image')->move('upload', $name);
        $validateData['image'] = $name;

        Post::create($validateData);
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Ditambah');
    }

    public function show(Post $post)
    {
        $title = $post->title;
        $post = Post::where('id', $post->id)->with('post_category', 'user_create', 'user_publish')->first();
        return view('backend.posts.show', compact('title', 'post'));
    }

    public function edit(Post $post)
    {
        if (auth()->user()->hasRole('Author')) {
            if (auth()->user()->id != $post->create_by) {
                return redirect()->route('dashboard.post.index')->with('error', 'Tidak Memiliki Hak Akses');
            }
        }
        $title = 'Ubah Data Berita & Artikel';
        $post = Post::where('id', $post->id)->with('post_category', 'user_create', 'user_publish')->first();
        $categories = PostCategory::orderBy('slug', 'asc')->get();
        return view('backend.posts.edit', compact('title', 'categories', 'post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $validateData = $request->validated();
        // $validateData['title'] = Str::title($validateData['title']);

        if ($request->file('image')) {
            if ($request->oldImage && $request->oldImage != 'defaultPost.png') {
                File::delete('upload/' . $request->oldImage);
            }
            $name = Str::random(20) . '.' . $request->file('image')->extension();
            $request->file('image')->move('upload', $name);
            $validateData['image'] = $name;
            $changeImage = '1';
        } else {
            $changeImage = '0';
        }

        if ($request->oldTitle != $validateData['title'] || $request->oldSlug != $validateData['slug'] || $request->oldCategory != $validateData['category_id'] || $changeImage == 1 || $request->oldContent != $validateData['content']) {
            $validateData['isPublish'] = 0;
            $validateData['publish_by'] = null;
            $validateData['publish_at'] = null;
        }

        Post::where('id', $post->id)->update($validateData);
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Diubah');
    }

    public function delete(Post $post)
    {
        if (auth()->user()->hasRole('Author')) {
            if (auth()->user()->id != $post->create_by) {
                return redirect()->route('dashboard.post.index')->with('error', 'Tidak Memiliki Hak Akses');
            }
        }

        $post->isPublish = 0;
        $post->publish_by = null;
        $post->publish_at = null;
        $post->update();

        Post::where('id', $post->id)->delete();
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Dihapus');
    }

    public function deleted()
    {
        $title = 'Data Dihapus';
        $posts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
        return view('backend.posts.deleted', compact('title', 'posts'));
    }

    public function restore($slug)
    {
        Post::onlyTrashed()->where('slug', $slug)->restore();
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Dikembalikan');
    }

    public function restoreAll()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Dikembalikan Semua');
    }

    public function deletePermanent($slug)
    {
        $post = Post::onlyTrashed()->where('slug', $slug)->first();
        if ($post->image != 'defaultPost.png') {
            File::delete('upload/' . $post->image);
        }
        $post->forceDelete();
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Dihapus Permanen');
    }

    public function deletePermanentAll()
    {
        $posts = Post::onlyTrashed()->get();
        foreach ($posts as $post) {
            if ($post->image != 'defaultPost.png') {
                File::delete('upload/' . $post->image);
            }
            $post->forceDelete();
        }
        return redirect()->route('dashboard.post.index')->with('success', 'Data Berita & Artikel Berhasil Dihapus Permanen Semua');
    }

    public function publish($slug, $user)
    {
        $user = User::where('token', $user)->first();
        $post = Post::where('slug', $slug)->first();
        $post->isPublish = 1;
        $post->publish_by = $user->id;
        $post->publish_at = now();
        $post->update();
        return redirect()->route('dashboard.post.show', $slug)->with('success', 'Berita / Artikel Berhasil Dipublish');
    }

    public function notPublish($slug, $user)
    {
        $user = User::where('token', $user)->first();
        $post = Post::where('slug', $slug)->first();
        $post->isPublish = 0;
        $post->publish_by = null;
        $post->publish_at = null;
        $post->update();
        return redirect()->route('dashboard.post.show', $slug)->with('success', 'Publish Berita / Artikel Berhasil Dibatalkan');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
