<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Sent;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
       return view('contact.index');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11|min:11',
            'area' => 'required'
        ]);

        $contact = new Contact;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->address = $request->address;
        $contact->contact = $request->contact;
        $contact->area_id = $request->area+1;
        $contact->save();

        return redirect('contact/list')->withSuccess('New contact added successfully');
    }

    public function show()
    {
        $contacts = Contact::all();

        return view('contact.list', compact('contacts'));
    }

    public function destroy($id)
    {
        Sent::where('contact_id',$id)->delete();
        $contact = Contact::find($id);

        $contact->delete();

        return redirect('contact/list')->withDelete('Contact deleted successfully.');
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('contact.edit', compact('contact'));   
    }

    public function update(Request $request)
    {
        $data = request()->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'address' => 'required|string',
            'contact' => 'required|string|max:11|min:11',
            'area' => 'required'

        ]);

        $contact = Contact::find($request->id);
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->address = $request->address;
        $contact->contact = $request->contact;
        $contact->area_id = $request->area+1;
        $contact->save();

        return redirect('contact/list')->withUpdate('Contact updated successfully');
    }
}
