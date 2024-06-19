<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {

        $users = User::paginate(10); // Assuming you want to paginate users, adjust '10' as per your preference

    return view('admin.users.list', [
        'title' => 'Danh sách người dùng',
        'users' => $users,
    ]);
    }

    public function edit(User $user)
    {
        $title = 'Chỉnh sửa người dùng';
        return view('admin.users.edit', compact('user', 'title'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            // Thêm các rules validation khác nếu cần thiết
        ]);

        $user->update($request->all());

        return redirect('/admin/users/list')->with('success', 'User updated successfully');
    }
    public function destroy(Request $request)
    {
        \Log::info($request->all());

        $ma_user = $request->input('id_cb');

        // Tìm user theo ID
        $user = User::find($ma_user);

        if (!$user) {
            return response()->json(['error' => true, 'message' => 'User not found'], 404);
        }

        try {
            // Xóa user
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully']);
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            \Log::error('Error deleting user: ' . $e->getMessage());
            return response()->json(['error' => true, 'message' => 'Delete failed. Please try again.']);
        }
    }
}
