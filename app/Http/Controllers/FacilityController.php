<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\Facility;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FacilityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:slider-list')->only('sliders');
        $this->middleware('permission:slider-edit')->only('sliderEdit', 'sliderUpdate');
        $this->middleware('permission:opening-edit')->only('openingEdit', 'openingUpdate');
        $this->middleware('permission:headmaster-edit')->only('headmasterEdit', 'headmasterUpdate');
        $this->middleware('permission:facility-list')->only('facilities');
        $this->middleware('permission:facility-create')->only('facilityCreate', 'facilityStore');
        $this->middleware('permission:facility-edit')->only('facilityEdit', 'facilityUpdate');
        $this->middleware('permission:facility-delete')->only('facilityDelete');
    }

    public function facilities()
    {
        $title = 'Data Fasilitas Sekolah';
        $facilities = Facility::orderBy('id', 'asc')->get();
        return view('backend.facilities.list', compact('title', 'facilities'));
    }

    public function facilityCreate()
    {
        $title = 'Tambah Data Fasilitas Sekolah';
        return view('backend.facilities.create', compact('title'));
    }

    public function facilityStore(StoreFacilityRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        $name = Str::random(20) . '.' . $request->file('image')->extension();
        $request->file('image')->move('upload', $name);
        $validateData['image'] = $name;
        Facility::create($validateData);
        return redirect()->route('dashboard.facilities')->with('success', 'Fasilitas Sekolah Berhasil Ditambah');
    }

    public function facilityEdit(Facility $facility)
    {
        $title = 'Ubah Data Fasilitas Sekolah';
        return view('backend.facilities.edit', compact('title', 'facility'));
    }

    public function facilityUpdate(UpdateFacilityRequest $request, Facility $facility)
    {
        $validateData = $request->validated();

        if ($request->file('image')) {
            if ($request->oldImage && $request->oldImage != 'defaultSlider.jpg') {
                File::delete('upload/' . $request->oldImage);
            }
            $name = Str::random(20) . '.' . $request->file('image')->extension();
            $request->file('image')->move('upload', $name);
            $validateData['image'] = $name;
        }

        Facility::where('id', $facility->id)->update($validateData);
        return redirect()->route('dashboard.facilities')->with('success', 'Fasilitas Sekolah Berhasil Diubah');
    }

    public function facilityDelete(Facility $facility)
    {
        Facility::where('id', $facility->id)->delete();
        return redirect()->route('dashboard.facilities')->with('success', 'Fasilitas Sekolah Berhasil Dihapus');
    }
}
