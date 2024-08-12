<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getlist()
    {
        $results = User::with(['department', 'designation'])->get();
        return view('users.index', compact('results'));
    }

    public function search(Request $request)
    {
        $searchedText = $request->input('searchedText');
        $result = User::query();
        if ($searchedText) {
            $result->where(function ($q) use ($searchedText) {
                $q->where('name', 'LIKE', '%' . $searchedText . '%')
                  ->orWhereHas('department', function ($q) use ($searchedText) {
                      $q->where('name', 'LIKE', '%' . $searchedText . '%');
                  })
                  ->orWhereHas('designation', function ($q) use ($searchedText) {
                      $q->where('name', 'LIKE', '%' . $searchedText . '%');
                  });
            });
        }
    
        $users = $result->with(['department', 'designation'])->get();
    
        return response()->json([
            'usersDetails' => $users,
        ]);
    }
    
    
    
}
