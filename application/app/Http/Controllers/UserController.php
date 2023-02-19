<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return view
     */
    public function index(Request $request)
    {
        $data = $this->pagination($request);

        return view('users.list', [
            'data' => $data
        ]);
    }

    /**
     * @return array
     */
    public function pagination(Request $request)
    {
        $length = 10;
        $start = ($request->get('p')) ? ((($request->get('p') - 1) * $length) + 1) : 0;
        $sort = ($request->get('sort')) ? $request->get('sort') : 'desc';
        $search = ($request->get('q')) ? $request->get('q') : '';

        $userModel = new User();
        $data = $userModel->getUser($length, $start, $sort, $search);

        return $data;
    }

    /**
     * @return view
     */
    public function add()
    {
        $roles = Role::get();

        return view('users.add', [
            'roles' => $roles
        ]);
    }

    /**
     * @return void
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'name' => 'required',
            'role' => 'required',
        ]);

        $email = $request->get('email');
        $password = $request->get('password');
        $name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $role = $request->get('role');

        $userId = User::create([
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => $role,
            'created_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        UserInformation::create([
            'user_id' => $userId->id,
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'phone' => $phone,
        ]);

        return redirect('/users');
    }
}
