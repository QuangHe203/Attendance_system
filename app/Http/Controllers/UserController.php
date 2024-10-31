<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

<<<<<<< HEAD
        $users = User::where('role', '!=', 'admin');
=======
        $users = User::query();
>>>>>>> e37b194 (update)

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
        
<<<<<<< HEAD
        $users = User::where('role', '!=', 'admin')->paginate(10);
=======
        $users = User::all();
>>>>>>> e37b194 (update)

        if ($users->count() > 0) {
            $table = '';
            foreach ($users as $user) {
                if ($user->role == 'student') {
                    $table .= "
                <tr>
                    <td style='text-align: start'><img src='{$user->student->image}' width='65' height='auto'></td>
<<<<<<< HEAD
                    <td style='text-align: start'>{$user->student->fullname}</td>
                    <td style='text-align: start'>{$user->reference_id}</td>
                    <td style='text-align: start'>{$user->student->phonenumber}</td>
                    <td style='text-align: start'>Sinh viên</td>
                    <td style='text-align: start'><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td style='text-align: start'><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
=======
                    <td>{$user->student->fullname}</td>
                    <td>{$user->reference_id}</td>
                    <td>{$user->student->phonenumber}</td>
                    <td>Sinh viên</td>
                    <td><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
>>>>>>> e37b194 (update)
                </tr>
                ";
                } elseif ($user->role == 'teacher') {
                    $table .= "
                <tr>
                    <td style='text-align: start'><img src='{$user->teacher->image}' width='65' height='auto'></td>
<<<<<<< HEAD
                    <td style='text-align: start'>{$user->teacher->fullname}</td>
                    <td style='text-align: start'>{$user->reference_id}</td>
                    <td style='text-align: start'>{$user->teacher->phonenumber}</td>
                    <td style='text-align: start'>Giáo viên</td>
                    <td style='text-align: start'><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td style='text-align: start'><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
=======
                    <td>{$user->teacher->fullname}</td>
                    <td>{$user->reference_id}</td>
                    <td>{$user->teacher->phonenumber}</td>
                    <td>Giáo viên</td>
                    <td><a href='" . route('user.edit', $user->reference_id) . "'><img src='" . asset('images/editing.png') . "' width='20px' height='auto'></a></td>
                    <td><a href='" . route('user.delete', $user->reference_id) . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa tài khoản này?\");'><img src='" . asset('images/delete.png') . "' width='20px' height='auto'></a></td>
>>>>>>> e37b194 (update)
                </tr>
                ";
                }
            }

            return response()->json([
                'table' => $table,
            ]);
        }
    }
}
