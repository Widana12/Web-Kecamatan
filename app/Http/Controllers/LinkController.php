<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:general-setting');
    }

    public function index()
    {
        $title = 'Link Setting';
        $links = Link::all();
        return view('backend.general-setting.links.index', compact('title', 'links'));
    }

    public function create()
    {
        $title = 'Tambah Data Link';
        return view('backend.general-setting.links.create', compact('title'));
    }

    public function store(LinkRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        Link::create($validateData);
        return redirect()->route('dashboard.links.index')->with('success', 'Data Link Berhasil Ditambah');
    }

    public function edit(Link $link)
    {
        $title = 'Ubah Data Link';
        return view('backend.general-setting.links.edit', compact('title', 'link'));
    }

    public function update(LinkRequest $request, Link $link)
    {
        $validateData = $request->validated();
        Link::where('id', $link->id)->update($validateData);
        return redirect()->route('dashboard.links.index')->with('success', 'Data Link Berhasil Diubah');
    }

    public function destroy(Link $link)
    {
        Link::where('id', $link->id)->delete();
        return redirect()->route('dashboard.links.index')->with('success', 'Data Link Berhasil Dihapus');
    }
}
