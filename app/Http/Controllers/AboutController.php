<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionValueRequest;
use App\Http\Requests\SchoolAboutRequest;
use App\Http\Requests\ServiamValueRequest;
use App\Models\SchoolAbout;
use App\Models\SchoolMission;
use App\Models\SchoolServiamValue;
use App\Models\SchoolValue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:profile-edit')->only('profile', 'profileUpdate');
        $this->middleware('permission:history-edit')->only('history', 'historyUpdate');
        $this->middleware('permission:vision-edit')->only('visionMission', 'visionUpdate');
        $this->middleware('permission:mission-list')->only('visionMission');
        $this->middleware('permission:mission-create')->only('missionCreate', 'missionStore');
        $this->middleware('permission:mission-edit')->only('missionEdit', 'missionUpdate');
        $this->middleware('permission:mission-delete')->only('missionDelete');
        $this->middleware('permission:value-proposition-list')->only('visionMission');
        $this->middleware('permission:value-proposition-create')->only('valueCreate', 'valueStore');
        $this->middleware('permission:value-proposition-edit')->only('valueEdit', 'valueUpdate');
        $this->middleware('permission:value-proposition-delete')->only('valueDelete');
        $this->middleware('permission:serviam-description-edit')->only('serviam', 'serviamDescriptionUpdate');
        $this->middleware('permission:serviam-value-list')->only('serviam');
        $this->middleware('permission:serviam-value-create')->only('serviamValueCreate', 'serviamValueStore');
        $this->middleware('permission:serviam-value-edit')->only('serviamValueEdit', 'serviamValueUpdate');
        $this->middleware('permission:serviam-value-delete')->only('serviamValueDelete');
        $this->middleware('permission:entrepreneurship-edit')->only('entrepreneurship', 'entrepreneurshipUpdate');
    }

    public function profile()
    {
        $title = 'Profil Sekolah';
        $profile = SchoolAbout::where('name', 'profile')->first();
        return view('backend.about.profile', compact('title', 'profile'));
    }

    public function profileUpdate(SchoolAboutRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            if ($request->oldBackground && $request->oldBackground != 'defaultBackground.jpg') {
                File::delete('upload/' . $request->oldBackground);
            }
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        SchoolAbout::where('name', 'profile')->update($validateData);
        return redirect()->route('dashboard.about.profile')->with('success', 'Profil Sekolah Berhasil Diubah');
    }

    public function history()
    {
        $title = 'Sejarah Sekolah';
        $history = SchoolAbout::where('name', 'history')->first();
        return view('backend.about.history', compact('title', 'history'));
    }

    public function historyUpdate(SchoolAboutRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            if ($request->oldBackground && $request->oldBackground != 'defaultBackground.jpg') {
                File::delete('upload/' . $request->oldBackground);
            }
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        SchoolAbout::where('name', 'history')->update($validateData);
        return redirect()->route('dashboard.about.history')->with('success', 'Profil Sekolah Berhasil Diubah');
    }

    public function visionMission()
    {
        $title = 'Visi & Misi';
        $vision = SchoolAbout::where('name', 'vision')->first();
        $missions = SchoolMission::orderBy('id', 'asc')->get();
        $values = SchoolValue::orderBy('id', 'asc')->get();
        return view('backend.about.vision-mission', compact('title', 'vision', 'missions', 'values'));
    }

    public function visionUpdate(SchoolAboutRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            if ($request->oldBackground && $request->oldBackground != 'defaultBackground.jpg') {
                File::delete('upload/' . $request->oldBackground);
            }
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        if ($request->file('image')) {
            if ($request->oldImage && $request->oldImage != 'defaultImage.png') {
                File::delete('upload/' . $request->oldImage);
            }
            $name = Str::random(20) . '.' . $request->file('image')->extension();
            $request->file('image')->move('upload', $name);
            $validateData['image'] = $name;
        }

        SchoolAbout::where('name', 'vision')->update($validateData);
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Visi Sekolah Berhasil Diubah');
    }

    public function missionCreate()
    {
        $title = 'Tambah Data Misi';
        return view('backend.about.mission-create', compact('title'));
    }

    public function missionStore(MissionValueRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        SchoolMission::create($validateData);
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Misi Sekolah Berhasil Ditambah');
    }

    public function missionEdit(SchoolMission $mission)
    {
        $title = 'Ubah Data Misi';
        return view('backend.about.mission-edit', compact('title', 'mission'));
    }

    public function missionUpdate(MissionValueRequest $request, SchoolMission $mission)
    {
        $validateData = $request->validated();
        SchoolMission::where('id', $mission->id)->update($validateData);
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Misi Sekolah Berhasil Diubah');
    }

    public function missionDelete(SchoolMission $mission)
    {
        SchoolMission::where('id', $mission->id)->delete();
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Misi Sekolah Berhasil Dihapus');
    }

    public function valueCreate()
    {
        $title = 'Tambah Data Misi';
        return view('backend.about.value-create', compact('title'));
    }

    public function valueStore(MissionValueRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        SchoolValue::create($validateData);
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Value Proposition Berhasil Ditambah');
    }

    public function valueEdit(SchoolValue $value)
    {
        $title = 'Ubah Data Misi';
        return view('backend.about.value-edit', compact('title', 'value'));
    }

    public function valueUpdate(MissionValueRequest $request, SchoolValue $value)
    {
        $validateData = $request->validated();
        SchoolValue::where('id', $value->id)->update($validateData);
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Value Proposition Berhasil Diubah');
    }

    public function valueDelete(SchoolValue $value)
    {
        SchoolValue::where('id', $value->id)->delete();
        return redirect()->route('dashboard.about.vision-mission.index')->with('success', 'Value Proposition Berhasil Dihapus');
    }

    public function serviam()
    {
        $title = 'Nilai Serviam';
        $serviamDescription = SchoolAbout::where('name', 'serviam')->first();
        $serviamValues = SchoolServiamValue::orderBy('id', 'asc')->get();
        return view('backend.about.serviam', compact('title', 'serviamDescription', 'serviamValues'));
    }

    public function serviamDescriptionUpdate(SchoolAboutRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            if ($request->oldBackground && $request->oldBackground != 'defaultBackground.jpg') {
                File::delete('upload/' . $request->oldBackground);
            }
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        if ($request->file('image')) {
            if ($request->oldImage && $request->oldImage != 'defaultImage.png') {
                File::delete('upload/' . $request->oldImage);
            }
            $name = Str::random(20) . '.' . $request->file('image')->extension();
            $request->file('image')->move('upload', $name);
            $validateData['image'] = $name;
        }

        SchoolAbout::where('name', 'serviam')->update($validateData);
        return redirect()->route('dashboard.about.serviam.index')->with('success', 'Deskripsi Nilai Serviam Berhasil Diubah');
    }

    public function serviamValueCreate()
    {
        $title = 'Tambah Nilai Serviam';
        return view('backend.about.serviam-value-create', compact('title'));
    }

    public function serviamValueStore(ServiamValueRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        SchoolServiamValue::create($validateData);
        return redirect()->route('dashboard.about.serviam.index')->with('success', 'Nilai Serviam Berhasil Ditambah');
    }

    public function serviamValueEdit(SchoolServiamValue $value)
    {
        $title = 'Ubah Nilai Serviam';
        return view('backend.about.serviam-value-edit', compact('title', 'value'));
    }

    public function serviamValueUpdate(ServiamValueRequest $request, SchoolServiamValue $value)
    {
        $validateData = $request->validated();
        SchoolServiamValue::where('id', $value->id)->update($validateData);
        return redirect()->route('dashboard.about.serviam.index')->with('success', 'Nilai Serviam Berhasil Diubah');
    }

    public function serviamValueDelete(SchoolServiamValue $value)
    {
        SchoolServiamValue::where('id', $value->id)->delete();
        return redirect()->route('dashboard.about.serviam.index')->with('success', 'Nilai Serviam Berhasil Dihapus');
    }

    public function entrepreneurship()
    {
        $title = 'Sejarah Sekolah';
        $entrepreneurship = SchoolAbout::where('name', 'entrepreneurship')->first();
        return view('backend.about.entrepreneurship', compact('title', 'entrepreneurship'));
    }

    public function entrepreneurshipUpdate(SchoolAboutRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            if ($request->oldBackground && $request->oldBackground != 'defaultBackground.jpg') {
                File::delete('upload/' . $request->oldBackground);
            }
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        SchoolAbout::where('name', 'entrepreneurship')->update($validateData);
        return redirect()->route('dashboard.about.entrepreneurship')->with('success', 'Profil Sekolah Berhasil Diubah');
    }
}
