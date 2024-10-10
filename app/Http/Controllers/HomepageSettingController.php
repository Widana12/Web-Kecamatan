<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeadmasterRequest;
use App\Http\Requests\OpeningRequest;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\OpeningHeadmaster;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomepageSettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:slider-list')->only('sliders');
        $this->middleware('permission:slider-edit')->only('sliderEdit', 'sliderUpdate');
        $this->middleware('permission:opening-edit')->only('openingEdit', 'openingUpdate');
        $this->middleware('permission:headmaster-edit')->only('headmasterEdit', 'headmasterUpdate');
        $this->middleware('permission:testimonial-list')->only('testimonials');
        $this->middleware('permission:testimonial-create')->only('testimonialCreate', 'testimonialStore');
        $this->middleware('permission:testimonial-edit')->only('testimonialEdit', 'testimonialUpdate');
        $this->middleware('permission:testimonial-delete')->only('testimonialDelete');
    }

    public function sliders()
    {
        $title = 'Data Slider';
        $sliders = Slider::orderBy('id', 'asc')->get();
        return view('backend.homepage.slider-list', compact('title', 'sliders'));
    }

    public function sliderEdit(Slider $slider)
    {
        $title = 'Ubah Data Slider';
        return view('backend.homepage.slider-edit', compact('title', 'slider'));
    }

    public function sliderUpdate(SliderRequest $request, Slider $slider)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            if ($request->oldBackground && $request->oldBackground != 'defaultSlider.jpg') {
                File::delete('upload/' . $request->oldBackground);
            }
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        Slider::where('id', $slider->id)->update($validateData);
        return redirect()->route('dashboard.homepage.sliders')->with('success', 'Slider Berhasil Diubah');
    }

    public function openingEdit()
    {
        $title = 'Data Opening';
        $opening = OpeningHeadmaster::where('id', 1)->first();
        return view('backend.homepage.opening-edit', compact('title', 'opening'));
    }

    public function openingUpdate(OpeningRequest $request)
    {
        $validateData = $request->validated();

        OpeningHeadmaster::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.homepage.opening')->with('success', 'Opening Berhasil Diubah');
    }

    public function headmasterEdit()
    {
        $title = 'Data Headmaster';
        $headmaster = OpeningHeadmaster::where('id', 1)->first();
        return view('backend.homepage.headmaster-edit', compact('title', 'headmaster'));
    }

    public function headmasterUpdate(HeadmasterRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('headmaster_image')) {
            if ($request->oldHeadmasterImage && $request->oldHeadmasterImage != 'defaultHeadmaster.jpg') {
                File::delete('upload/' . $request->oldHeadmasterImage);
            }
            $name = Str::random(20) . '.' . $request->file('headmaster_image')->extension();
            $request->file('headmaster_image')->move('upload', $name);
            $validateData['headmaster_image'] = $name;
        }

        OpeningHeadmaster::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.homepage.headmaster')->with('success', 'Headmaster Berhasil Diubah');
    }

    public function testimonials()
    {
        $title = 'Data Testimonial';
        $testimonials = Testimonial::orderBy('id', 'asc')->get();
        return view('backend.homepage.testimonial-list', compact('title', 'testimonials'));
    }

    public function testimonialCreate()
    {
        $title = 'Tambah Data Testimonial';
        return view('backend.homepage.testimonial-create', compact('title'));
    }

    public function testimonialStore(StoreTestimonialRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        $name = Str::random(20) . '.' . $request->file('image')->extension();
        $request->file('image')->move('upload', $name);
        $validateData['image'] = $name;
        Testimonial::create($validateData);
        return redirect()->route('dashboard.homepage.testimonials')->with('success', 'Testimoni Berhasil Ditambah');
    }

    public function testimonialEdit(Testimonial $testimonial)
    {
        $title = 'Ubah Data Testimonial';
        return view('backend.homepage.testimonial-edit', compact('title', 'testimonial'));
    }

    public function testimonialUpdate(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $validateData = $request->validated();

        if ($request->file('image')) {
            if ($request->oldImage && $request->oldImage != 'defaultTestimonial.png') {
                File::delete('upload/' . $request->oldImage);
            }
            $name = Str::random(20) . '.' . $request->file('image')->extension();
            $request->file('image')->move('upload', $name);
            $validateData['image'] = $name;
        }

        Testimonial::where('id', $testimonial->id)->update($validateData);
        return redirect()->route('dashboard.homepage.testimonials')->with('success', 'Testimoni Berhasil Diubah');
    }

    public function testimonialDelete(Testimonial $testimonial)
    {
        Testimonial::where('id', $testimonial->id)->delete();
        return redirect()->route('dashboard.homepage.testimonials')->with('success', 'Testimoni Berhasil Dihapus');
    }
}
