<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:gallery-list')->only('index', 'show');
        $this->middleware('permission:gallery-create')->only('create', 'store');
        $this->middleware('permission:gallery-edit')->only('edit', 'update');
        $this->middleware('permission:gallery-delete')->only('delete');
        $this->middleware('permission:gallery-deleted')->only('deleted', 'restore', 'restoreAll', 'deletePermanent', 'deletePermanentAll');
        $this->middleware('permission:gallery-publish')->only('publish', 'notPublish');
        $this->middleware('permission:gallery-image')->only('images', 'imagesUpload', 'imagesDelete');
    }

    public function index()
    {
        $title = 'Data Galeri Foto';
        if (auth()->user()->hasRole('Author')) {
            $galleries = Gallery::where('create_by', auth()->user()->id)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
            $np_galleries = Gallery::where('create_by', auth()->user()->id)->where('isPublish', 0)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
            $p_galleries = Gallery::where('create_by', auth()->user()->id)->where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        } else {
            $galleries = Gallery::orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
            $np_galleries = Gallery::where('isPublish', 0)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
            $p_galleries = Gallery::where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        }
        return view('backend.galleries.list', compact('title', 'galleries', 'np_galleries', 'p_galleries'));
    }

    public function create()
    {
        $title = 'Tambah Data Galeri Foto';
        $categories = GalleryCategory::orderBy('slug', 'asc')->get();
        return view('backend.galleries.create', compact('title', 'categories'));
    }

    public function store(StoreGalleryRequest $request)
    {
        $validateData = $request->validated();
        // $validateData['title'] = Str::title($validateData['title']);

        $name = Str::random(20) . '.' . $request->file('image')->extension();
        $request->file('image')->move('upload', $name);
        $validateData['image'] = $name;

        Gallery::create($validateData);
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Ditambah');
    }

    public function show(Gallery $gallery)
    {
        $title = $gallery->title;
        $gallery = Gallery::where('id', $gallery->id)->with('gallery_category', 'user_create', 'user_publish')->first();
        $gallery_images = GalleryImage::where('gallery_id', $gallery->id)->get();
        return view('backend.galleries.show', compact('title', 'gallery', 'gallery_images'));
    }

    public function edit(Gallery $gallery)
    {
        if (auth()->user()->hasRole('Author')) {
            if (auth()->user()->id != $gallery->create_by) {
                return redirect()->route('dashboard.gallery.index')->with('error', 'Tidak Memiliki Hak Akses');
            }
        }
        $title = 'Ubah Data Galeri Foto';
        $gallery = Gallery::where('id', $gallery->id)->with('gallery_category', 'user_create', 'user_publish')->first();
        $categories = GalleryCategory::orderBy('slug', 'asc')->get();
        return view('backend.galleries.edit', compact('title', 'categories', 'gallery'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
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

        if ($request->oldTitle != $validateData['title'] || $request->oldSlug != $validateData['slug'] || $request->oldCategory != $validateData['category_id'] || $changeImage == 1) {
            $validateData['isPublish'] = 0;
            $validateData['publish_by'] = null;
            $validateData['publish_at'] = null;
        }

        Gallery::where('id', $gallery->id)->update($validateData);
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Diubah');
    }

    public function delete(Gallery $gallery)
    {
        if (auth()->user()->hasRole('Author')) {
            if (auth()->user()->id != $gallery->create_by) {
                return redirect()->route('dashboard.gallery.index')->with('error', 'Tidak Memiliki Hak Akses');
            }
        }

        $gallery->isPublish = 0;
        $gallery->publish_by = null;
        $gallery->publish_at = null;
        $gallery->update();

        Gallery::where('id', $gallery->id)->delete();
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Dihapus');
    }

    public function deleted()
    {
        $title = 'Data Dihapus';
        $galleries = Gallery::onlyTrashed()->orderBy('deleted_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        return view('backend.galleries.deleted', compact('title', 'galleries'));
    }

    public function restore($slug)
    {
        Gallery::onlyTrashed()->where('slug', $slug)->restore();
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Dikembalikan');
    }

    public function restoreAll()
    {
        Gallery::onlyTrashed()->restore();
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Dikembalikan Semua');
    }

    public function deletePermanent($slug)
    {
        $gallery = Gallery::onlyTrashed()->where('slug', $slug)->first();
        if ($gallery->image != 'defaultPost.png') {
            File::delete('upload/' . $gallery->image);
        }
        $gallery->forceDelete();
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Dihapus Permanen');
    }

    public function deletePermanentAll()
    {
        $galleries = Gallery::onlyTrashed()->get();
        foreach ($galleries as $gallery) {
            if ($gallery->image != 'defaultPost.png') {
                File::delete('upload/' . $gallery->image);
            }
            $gallery->forceDelete();
        }
        return redirect()->route('dashboard.gallery.index')->with('success', 'Data Galeri Foto Berhasil Dihapus Permanen Semua');
    }

    public function publish($slug, $user)
    {
        $user = User::where('token', $user)->first();
        $gallery = Gallery::where('slug', $slug)->first();
        $gallery->isPublish = 1;
        $gallery->publish_by = $user->id;
        $gallery->publish_at = now();
        $gallery->update();
        return redirect()->route('dashboard.gallery.show', $slug)->with('success', 'Galeri Foto Berhasil Dipublish');
    }

    public function notPublish($slug, $user)
    {
        $user = User::where('token', $user)->first();
        $gallery = Gallery::where('slug', $slug)->first();
        $gallery->isPublish = 0;
        $gallery->publish_by = null;
        $gallery->publish_at = null;
        $gallery->update();
        return redirect()->route('dashboard.gallery.show', $slug)->with('success', 'Publish Galeri Foto Berhasil Dibatalkan');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Gallery::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function images(Gallery $gallery)
    {
        $title = $gallery->title;
        $gallery = Gallery::where('id', $gallery->id)->with('gallery_category', 'user_create', 'user_publish')->first();
        $gallery_images = GalleryImage::where('gallery_id', $gallery->id)->get();
        return view('backend.galleries.image', compact('title', 'gallery', 'gallery_images'));
    }

    public function imagesUpload(Request $request, Gallery $gallery)
    {
        $images = explode(',', $request->image);
        foreach ($images as $image) {
            $uri = explode('/', $image);
            $validateData = [
                'gallery_id' => $gallery->id,
                'token' => Str::random(20),
                'image' => $uri[6]
            ];
            GalleryImage::create($validateData);
        }
        return redirect()->route('dashboard.gallery.images', $gallery->slug)->with('success', 'Foto Galeri Berhasil Ditambah');
    }

    public function imagesDelete(Gallery $gallery, GalleryImage $gallery_image)
    {
        GalleryImage::find($gallery_image->id)->delete();
        return redirect()->route('dashboard.gallery.images', $gallery->slug)->with('success', 'Foto Galeri Berhasil Dihapus');
    }
}
