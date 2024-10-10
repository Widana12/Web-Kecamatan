<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Data Kontak';
        $contact = Contact::where('id', 1)->first();
        return view('backend.contact.edit', compact('title', 'contact'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $validateData = $request->validated();

        if ($request->file('background')) {
            File::delete('upload/' . $request->oldBackground);
            $name = Str::random(20) . '.' . $request->file('background')->extension();
            $request->file('background')->move('upload', $name);
            $validateData['background'] = $name;
        }

        Contact::where('id', 1)->update($validateData);
        return redirect()->route('dashboard.contact')->with('success', 'Data Kontak Berhasil Diubah');
    }
}
