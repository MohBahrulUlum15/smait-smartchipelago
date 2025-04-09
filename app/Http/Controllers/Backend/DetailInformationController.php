<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailInformationController extends Controller
{
    public function index()
    {
        // Fetch the detail information from the database
        $detailInformation = \App\Models\DetailInformation::first();

        // Return the view with the detail information
        return view('backend.pages.detail-info.index', compact('detailInformation'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email_info' => 'nullable|email',
            'phone_info' => 'nullable|string|max:15',
            'address_info' => 'nullable|string|max:255',
            'website_name_info' => 'nullable|string|max:255',
            'website_link_info' => 'nullable|url',
            'facebook_link_info' => 'nullable|url',
            'instagram_link_info' => 'nullable|url',
            'youtube_link_info' => 'nullable|url',
        ]);

        // Update the detail information in the database
        $detailInformation = \App\Models\DetailInformation::first();
        $detailInformation->update($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Detail information updated successfully.');
    }
}
