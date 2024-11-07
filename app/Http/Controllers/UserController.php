<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function showAccountDetail(Request $request)
    {
        $accounts = User::where('role', '!=', 'admin')->paginate(10);
        foreach ($accounts as $account) {
            if ($account->role == 'student') {
                $account->fullname = $account->student ? $account->student->fullname : 'N/A';
                $account->phonenumber = $account->student ? $account->student->phonenumber : 'N/A';
                $account->image = $account->student ? $account->student->image : 'N/A';
            } elseif ($account->role == 'teacher') {
                $account->fullname = $account->teacher ? $account->teacher->fullname : 'N/A';
                $account->phonenumber = $account->teacher ? $account->teacher->phonenumber : 'N/A';
                $account->image = $account->teacher ? $account->teacher->image : 'N/A';
            }
        }
        return view('admin.admin_account_management', compact('accounts'));
    }


    public function search(Request $request)
    {
        $query = $request->input('q');
        $role = $request->input('role');

        $users = User::where('role', '!=', 'admin');

        if ($query) {
            $users->where('user_id', 'like', "%{$query}%")
                ->orWhere('usename', 'like', "%{$query}%");
        }

        if ($role && $role !== 'option1') {
            $roleFilter = $role === 'option2' ? 'teacher' : 'student';
            $users->where('role', $roleFilter);
        }
        $users = $users->paginate(10);

        if ($users->count() > 0) {
            $table = '';
            foreach ($users as $user) {
                if ($user->role == 'student') {
                    $table .= "
                <tr>
                    <td style='text-align: start'><img src='{$user->student->image}' width='65' height='auto'></td>
                    <td style='text-align: start'>{$user->student->fullname}</td>
                    <td style='text-align: start'>{$user->reference_id}</td>
                    <td style='text-align: start'>{$user->student->phonenumber}</td>
                    <td style='text-align: start'>Sinh viên</td>
                    <td style='text-align: start'><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td style='text-align: start'><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
                </tr>
                ";
                } elseif ($user->role == 'teacher') {
                    $table .= "
                <tr>
                    <td style='text-align: start'><img src='{$user->teacher->image}' width='65' height='auto'></td>
                    <td style='text-align: start'>{$user->teacher->fullname}</td>
                    <td style='text-align: start'>{$user->reference_id}</td>
                    <td style='text-align: start'>{$user->teacher->phonenumber}</td>
                    <td style='text-align: start'>Giáo viên</td>
                    <td><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
                </tr>
                ";
                }
            }

            return response()->json([
                'table' => $table,
            ]);
        }

        return response()->json([
            'message' => 'Không tìm thấy người dùng nào',
        ]);
    }

    public function list(Request $request)
    {

        $users = User::all();

        if ($users->count() > 0) {
            $table = '';
            foreach ($users as $user) {
                if ($user->role == 'student') {
                    $table .= "
                <tr>
                    <td style='text-align: start'><img src='{$user->student->image}' width='65' height='auto'></td>
                    <td style='text-align: start'>{$user->student->fullname}</td>
                    <td style='text-align: start'>{$user->reference_id}</td>
                    <td style='text-align: start'>{$user->student->phonenumber}</td>
                    <td style='text-align: start'>Sinh viên</td>
                    <td style='text-align: start'><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td style='text-align: start'><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
                </tr>
                ";
                } elseif ($user->role == 'teacher') {
                    $table .= "
                <tr>
                    <td style='text-align: start'><img src='{$user->teacher->image}' width='65' height='auto'></td>
                    <td style='text-align: start'>{$user->teacher->fullname}</td>
                    <td style='text-align: start'>{$user->reference_id}</td>
                    <td style='text-align: start'>{$user->teacher->phonenumber}</td>
                    <td style='text-align: start'>Giáo viên</td>
                    <td><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
                </tr>
                ";
                }
            }

            return response()->json([
                'table' => $table,
            ]);
        }
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Lấy user theo reference_id
        $user = User::where('reference_id', '=', $id)->first();
        if ($user && $request->hasFile('image')) {
            $file = $request->file('image');
            $imageContent = file_get_contents($file->getRealPath()); // Đọc nội dung tệp

            if ($user->role == 'student') {
                $student = Student::where('student_id', '=', $user->reference_id)->first();
                if ($student) { // Kiểm tra xem student có tồn tại không
                    $student->image = $imageContent;
                    $student->save();
                } else {
                    return response()->json(['error' => 'Student not found.'], 404);
                }
            } elseif ($user->role == 'teacher') {
                $teacher = Teacher::where('teacher_id', '=', $user->reference_id)->first();
                if ($teacher) { // Kiểm tra xem teacher có tồn tại không
                    $teacher->image = $imageContent; // Lưu vào trường BLOB
                    $teacher->save();
                } else {
                    return response()->json(['error' => 'Teacher not found.'], 404);
                }
            }

            return response()->json(['success' => 'Image uploaded successfully.']);
        } else {
            return response()->json(['error' => 'User not found or no image uploaded.'], 404);
        }
    }
}
