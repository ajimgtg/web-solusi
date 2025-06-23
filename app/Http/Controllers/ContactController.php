<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first(); // Adjust query as needed
        $name = $contact ? $contact->name : 'Tidak ada data tersedia';
        $email = $contact ? $contact->email : 'Tidak ada data tersedia';
        $phone = $contact ? $contact->phone : 'Tidak ada data tersedia';
        $address = $contact ? $contact->address : 'Tidak ada data tersedia';
        $link_maps = $contact ? $contact->link_maps : 'Tidak ada data tersedia';
        $hari = $contact ? $contact->hari_oprasional : 'Tidak ada data tersedia';
        $jam = $contact ? $contact->jam_oprasional : 'Tidak ada data tersedia';

        return view('contact', compact('name', 'email', 'phone', 'address', 'link_maps', 'hari', 'jam'));
    }
}