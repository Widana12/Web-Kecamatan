<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Models\GeneralSetting;
use App\Models\Link;
use App\Models\OpeningHeadmaster;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\SchoolAbout;
use App\Models\SchoolActivity;
use App\Models\SchoolMission;
use App\Models\SchoolServiamValue;
use App\Models\SchoolValue;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomepageController extends Controller
{
    public function index()
    {
        $title = 'SMP Santa Ursula Bandung';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $sliders = Slider::orderBy('id', 'asc')->get();
        $posts = Post::where('isPublish', '1')->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
        $opening_headmaster = OpeningHeadmaster::where('id', 1)->first();
        $galleries = Gallery::where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        return view('index', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'sliders', 'posts', 'opening_headmaster', 'galleries', 'testimonials'));
    }

    public function profil()
    {
        $title = 'SMP Santa Ursula Bandung | Profil Sekolah';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $profile = SchoolAbout::where('name', 'profile')->first();
        return view('tentang-sekolah.profil', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'profile'));
    }

    public function sejarah()
    {
        $title = 'SMP Santa Ursula Bandung | Sejarah Sekolah';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $history = SchoolAbout::where('name', 'history')->first();
        return view('tentang-sekolah.sejarah', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'history'));
    }

    public function visiMisi()
    {
        $title = 'SMP Santa Ursula Bandung | Visi & Misi';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $vision = SchoolAbout::where('name', 'vision')->first();
        $missions = SchoolMission::orderBy('id', 'asc')->get();
        $values = SchoolValue::orderBy('id', 'asc')->get();
        return view('tentang-sekolah.visi-misi', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'vision', 'missions', 'values'));
    }

    public function serviam()
    {
        $title = 'SMP Santa Ursula Bandung | 6 Nilai Serviam';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $serviamDescription = SchoolAbout::where('name', 'serviam')->first();
        $serviamValues = SchoolServiamValue::orderBy('id', 'asc')->get();
        return view('tentang-sekolah.serviam', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'serviamDescription', 'serviamValues'));
    }

    public function entrepreneurship()
    {
        $title = 'SMP Santa Ursula Bandung | Entrepreneurship';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $entrepreneurship = SchoolAbout::where('name', 'entrepreneurship')->first();
        return view('tentang-sekolah.entrepreneurship', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'entrepreneurship'));
    }

    public function facilities()
    {
        $title = 'SMP Santa Ursula Bandung | Fasilitas';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $facilities = Facility::orderBy('id', 'asc')->get();
        return view('fasilitas.list', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'facilities'));
    }

    public function posts()
    {
        $title = 'SMP Santa Ursula Bandung | Berita & Artikel';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $posts = Post::where('isPublish', 1)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->paginate(6);
        return view('berita-artikel.lists', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'posts'));
    }

    public function postsByCategory(PostCategory $post_category)
    {
        $title = 'SMP Santa Ursula Bandung | ' . $post_category->name;
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $posts = Post::where('category_id', $post_category->id)->where('isPublish', 1)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->paginate(6);
        return view('berita-artikel.list-category', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'posts', 'post_category'));
    }

    public function postsByAuthor($slug)
    {
        $author = User::where('slug', $slug)->first();
        $title = 'SMP Santa Ursula Bandung | ' . $author->name;
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $posts = Post::where('create_by', $author->id)->where('isPublish', 1)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->paginate(6);
        return view('berita-artikel.list-author', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'posts', 'author'));
    }

    public function postDetail(Post $post)
    {
        $title = 'SMP Santa Ursula Bandung | ' . $post->title;
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $posts = Post::where('isPublish', 1)->orderBy('created_at', 'desc')->with('post_category', 'user_create', 'user_publish')->get();
        $post = Post::where('slug', $post->slug)->with('post_category', 'user_create', 'user_publish')->first();
        $galleries = Gallery::where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        return view('berita-artikel.detail', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'posts', 'post', 'galleries'));
    }

    public function galleries()
    {
        $title = 'SMP Santa Ursula Bandung | Galeri Foto';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $galleries = Gallery::where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        return view('galeri-foto.lists', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'galleries'));
    }

    public function galleriesByCategory(GalleryCategory $gallery_category)
    {
        $title = 'SMP Santa Ursula Bandung | ' . $gallery_category->name;
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $galleries = Gallery::where('category_id', $gallery_category->id)->where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        return view('galeri-foto.list-category', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'galleries', 'gallery_category'));
    }

    public function galleryDetail(Gallery $gallery)
    {
        $title = 'SMP Santa Ursula Bandung | ' . $gallery->title;
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $galleries = Gallery::where('isPublish', 1)->orderBy('created_at', 'desc')->with('gallery_category', 'user_create', 'user_publish')->get();
        $gallery = Gallery::where('slug', $gallery->slug)->with('gallery_category', 'user_create', 'user_publish')->first();
        $images = GalleryImage::where('gallery_id', $gallery->id)->get();
        return view('galeri-foto.detail', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'galleries', 'gallery', 'images'));
    }

    public function schoolActivity(SchoolActivity $school_activity)
    {
        $title = 'SMP Santa Ursula Bandung | ' . $school_activity->title;
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        return view('school-activity', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'school_activities', 'school_activity'));
    }

    public function kontak()
    {
        $title = 'SMP Santa Ursula Bandung | Kontak Sekolah';
        $setting = GeneralSetting::where('id', 1)->first();
        $links = Link::orderBy('id', 'asc')->get();
        $post_categories = PostCategory::orderBy('slug', 'asc')->get();
        $post_authors = User::role('Author')->orderBy('name', 'asc')->get();
        $gallery_categories = GalleryCategory::orderBy('slug', 'asc')->get();
        $school_activities = SchoolActivity::where('isPublish', '1')->orderBy('title', 'asc')->get();
        //
        $contact = Contact::where('id', 1)->first();
        return view('kontak.page', compact('title', 'setting', 'links', 'post_categories', 'post_authors', 'gallery_categories', 'school_activities', 'contact'));
    }

    public function kirimPesan(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $mailData = [
            'title' => 'SMP | Pertanyaan',
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'subject' => $validateData['subject'],
            'phone' => $validateData['phone'],
            'message' => $validateData['message']
        ];
        Mail::to('tk@santaursula-bdg.sch.id')->send(new ContactMail($mailData, $validateData['email'], $validateData['name'], $validateData['name']));
        return redirect()->route('kontak')->with('success', 'Pesan Berhasil Terkirim');
    }
}
