<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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

    public function uploadImage(Request $request, $reference_id)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $fileName = $reference_id . '.png';

            // Tìm người dùng dựa trên reference_id
            $user = User::where('reference_id', '=', $reference_id)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }

            // Chọn thư mục lưu ảnh tùy theo vai trò
            $rolePath = ($user->role == 'student') ? 'StudentImage' : 'TeacherImage';
            $model = ($user->role == 'student') ? Student::class : Teacher::class;
            $userModel = $model::where($user->role . '_id', '=', $user->reference_id)->first();

            // Kiểm tra người dùng tương ứng
            if (!$userModel) {
                return redirect()->back()->with('error', ucfirst($user->role) . ' not found.');
            }

            // Tạo thư mục nếu chưa có
            $destinationPath = public_path($rolePath);
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true);
            }

            // Xử lý và lưu ảnh
            $image = Image::make($file);
            $image->encode('png');
            $image->save($destinationPath . '/' . $fileName);

            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $userModel->image = $rolePath . '/' . $fileName;
            $userModel->save();

            // Tải lại trang và truyền thông báo thành công
            return redirect()->back()->with('success', 'Image uploaded and saved successfully!');
        }

        return redirect()->back()->with('error', 'No image file or invalid file!');
    }
}
