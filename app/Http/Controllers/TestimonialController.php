<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function submitTestimonial(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|string|email|max:255',
        ]);

        // Simpan testimoni ke database
        Testimonial::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih atas ulasannya!');
    }

    public function index()
    {
        $testimonials = Testimonial::all();
        return view('client.index', compact('testimonials'));
    }
}
