<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function clearSession(Request $request)
    {
        $request->session()->forget(['success', 'error']);
        return response()->json(['status' => 'success']);
    }
}
