<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterSettingRequest;
use App\Http\Requests\HeaderSettingRequest;
use App\Http\Requests\WebSettingRequest;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GeneralSettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:general-setting');
    }

    public function webSetting()
    {
        $title = 'Web Setting';
        $general_setting = GeneralSetting::where('id', 1)->first();
        return view('backend.general-setting.web-setting', compact('title', 'general_setting'));
    }

    public function webSettingUpdate(WebSettingRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('modal_image')) {
            if ($request->oldModalImage && $request->oldModalImage != 'psb-modal.jpg') {
                File::delete('upload/' . $request->oldModalImage);
            }
            $name = Str::random(20) . '.' . $request->file('modal_image')->extension();
            $request->file('modal_image')->move('upload', $name);
            $validateData['modal_image'] = $name;
        }

        GeneralSetting::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.web-setting')->with('success', 'Web Setting Berhasil Diubah');
    }

    public function headerSetting()
    {
        $title = 'Header Setting';
        $general_setting = GeneralSetting::where('id', 1)->first();
        return view('backend.general-setting.header-setting', compact('title', 'general_setting'));
    }

    public function headerSettingUpdate(HeaderSettingRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('header_logo_white')) {
            if ($request->oldHeaderLogoWhite && $request->oldHeaderLogoWhite != 'headerLogoWhite.png') {
                File::delete('upload/' . $request->oldHeaderLogoWhite);
            }
            $name = Str::random(20) . '.' . $request->file('header_logo_white')->extension();
            $request->file('header_logo_white')->move('upload', $name);
            $validateData['header_logo_white'] = $name;
        }

        if ($request->file('header_logo_black')) {
            if ($request->oldHeaderLogoBlack && $request->oldHeaderLogoBlack != 'headerLogoBlack.png') {
                File::delete('upload/' . $request->oldHeaderLogoBlack);
            }
            $name = Str::random(20) . '.' . $request->file('header_logo_black')->extension();
            $request->file('header_logo_black')->move('upload', $name);
            $validateData['header_logo_black'] = $name;
        }

        GeneralSetting::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.header-setting')->with('success', 'Header Setting Berhasil Diubah');
    }

    public function footerSetting()
    {
        $title = 'Footer Setting';
        $general_setting = GeneralSetting::where('id', 1)->first();
        return view('backend.general-setting.footer-setting', compact('title', 'general_setting'));
    }

    public function footerSettingUpdate(FooterSettingRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('footer_logo')) {
            if ($request->oldFooterLogo && $request->oldFooterLogo != 'footerLogo.png') {
                File::delete('upload/' . $request->oldFooterLogo);
            }
            $name = Str::random(20) . '.' . $request->file('footer_logo')->extension();
            $request->file('footer_logo')->move('upload', $name);
            $validateData['footer_logo'] = $name;
        }

        GeneralSetting::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.footer-setting')->with('success', 'Footer Setting Berhasil Diubah');
    }
}
