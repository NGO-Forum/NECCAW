<?php

namespace App\Http\Controllers;

use App\Models\NeccawConfirmation;
use Illuminate\Http\Request;

class NeccawConfirmationController extends Controller
{
    public function form()
    {
        return view('neccaw.form');
    }

    public function store(Request $request)
    {
        /* =====================
           DECLINE CASE
        ===================== */

        if ($request->interest === 'no') {

            NeccawConfirmation::create([
                'name' => trim($request->name),
                'email' => trim($request->email),
                'organization' => trim($request->organization),
                'interest' => 'no'
            ]);

            return redirect()->route('neccaw.thankyou');
        }

        /* =====================
           VALIDATION
        ===================== */

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'organization' => 'required|string|max:255',
            'interest' => 'required|in:yes,no',
            'experience' => 'required|min:10',
            'commitments' => 'required|array|min:1',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'bio' => 'required|min:20|max:3000',
            'comments' => 'nullable|string'
        ]);

        /* =====================
           FILE UPLOAD
        ===================== */

        $data['photo'] =
            $request->file('photo')
            ->store('neccaw/photos', 'public');

        /* =====================
           STORE
        ===================== */

        NeccawConfirmation::create([
            'name' => trim($data['name']),
            'email' => trim($data['email']),
            'organization' => trim($data['organization']),
            'interest' => 'yes',
            'experience' => $data['experience'],
            'commitments' => $data['commitments'],
            'photo' => $data['photo'],
            'bio' => $data['bio'],
            'comments' => $data['comments'] ?? null
        ]);

        return redirect()->route('neccaw.thankyou');
    }

    public function index()
    {
        $confirmations = NeccawConfirmation::latest()->paginate(10);
        return view('neccaw.admin', compact('confirmations'));
    }
}
