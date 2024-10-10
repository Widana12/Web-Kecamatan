<?php

namespace App\Http\Controllers;

use App\Models\SchoolActivity;
use App\Http\Requests\StoreSchoolActivityRequest;
use App\Http\Requests\UpdateSchoolActivityRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SchoolActivityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:school-activity-list')->only('index', 'show');
        $this->middleware('permission:school-activity-create')->only('create', 'store');
        $this->middleware('permission:school-activity-edit')->only('edit', 'update');
        $this->middleware('permission:school-activity-delete')->only('delete');
        $this->middleware('permission:school-activity-publish')->only('publish', 'notPublish');
    }

    public function index()
    {
        $title = 'Data Kegiatan Sekolah';
        $activities = SchoolActivity::orderBy('created_at', 'desc')->get();
        return view('backend.school-activities.list', compact('title', 'activities'));
    }

    public function create()
    {
        $title = 'Tambah Data Kegiatan Sekolah';
        return view('backend.school-activities.create', compact('title'));
    }

    public function store(StoreSchoolActivityRequest $request)
    {
        $validateData = $request->validated();
        $validateData['title'] = Str::title($validateData['title']);

        $name = Str::random(20) . '.' . $request->file('background')->extension();
        $request->file('background')->move('upload', $name);
        $validateData['background'] = $name;

        SchoolActivity::create($validateData);
        return redirect()->route('dashboard.school-activity.index')->with('success', 'Data Kegiatan Sekolah Berhasil Ditambah');
    }

    public function show(SchoolActivity $school_activity)
    {
        $title = $school_activity->title;
        return view('backend.school-activities.show', compact('title', 'school_activity'));
    }

    public function edit(SchoolActivity $school_activity)
    {
        $title = 'Ubah Data Kegiatan Sekolah';
        return view('backend.school-activities.edit', compact('title', 'school_activity'));
    }

    public function update(UpdateSchoolActivityRequest $request, SchoolActivity $school_activity)
    {
        $validateData = $request->validated();
        $validateData['title'] = Str::title($validateData['title']);

        if ($request->file('background')) {
            File::delete('upload/' . $request->oldBackground);
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        SchoolActivity::where('id', $school_activity->id)->update($validateData);
        return redirect()->route('dashboard.school-activity.index')->with('success', 'Data Kegiatan Sekolah Berhasil Diubah');
    }

    public function destroy(SchoolActivity $school_activity)
    {
        File::delete('upload/' . $school_activity->background);
        SchoolActivity::where('id', $school_activity->id)->delete();
        return redirect()->route('dashboard.school-activity.index')->with('success', 'Data Kegiatan Sekolah Berhasil Dihapus');
    }

    public function publish($slug)
    {
        $school_activity = SchoolActivity::where('slug', $slug)->first();
        $school_activity->isPublish = 1;
        $school_activity->update();
        return redirect()->route('dashboard.school-activity.show', $slug)->with('success', 'Data Kegiatan Sekolah Berhasil Dipublish');
    }

    public function notPublish($slug, $user)
    {
        $school_activity = SchoolActivity::where('slug', $slug)->first();
        $school_activity->isPublish = 0;
        $school_activity->update();
        return redirect()->route('dashboard.school-activity.show', $slug)->with('success', 'Publish Data Kegiatan Sekolah Berhasil Dibatalkan');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(SchoolActivity::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
