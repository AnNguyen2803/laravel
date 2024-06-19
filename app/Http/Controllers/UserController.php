<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust the namespace based on your User model

class UserController extends Controller
{
    public function information()
    {
        $user = auth()->user();
        return view('users.information', compact('user'));
    }

    public function editInformation()
    {
        $user = auth()->user();
        return view('users.editInformation', compact('user'));
    }

    public function updateInformation(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            // Add more validation rules as needed
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        // Update other fields as needed

        $user->save();

        return redirect()->route('user.information')->with('success', 'Thông tin của bạn đã được cập nhật thành công.');
    }
}
