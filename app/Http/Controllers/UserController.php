<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

public function index()
{
$data = User::orderBy('id','DESC')->get();
return view('admin.users.index',compact('data'));
}


public function create()
{
$roles = Role::pluck('name','name')->all();
return view('admin.users.create',compact('roles'));
}


public function store(Request $request)
{
    $this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'roles' => 'required'
]);

$input = $request->all();
$input['password'] = Hash::make($input['password']);

$user = User::create($input);
$user->assignRole($request->input('roles'));

return redirect()->route('admin.users.index')
->with('success','User created successfully');
}

public function show($id)
{
$user = User::find($id);
return view('admin.users.show',compact('user'));
}

public function edit($id)
{
$user = User::find($id);
$roles = Role::pluck('name','name')->all();
$userRole = $user->roles->pluck('name','name')->all();

return view('admin.users.edit',compact('user','roles','userRole'));
}

public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'password' => 'same:confirm-password',
'roles' => 'required'
]);

$input = $request->all();
if(!empty($input['password'])){
$input['password'] = Hash::make($input['password']);
}else{
$input = Arr::except($input,array('password'));
}

$user = User::find($id);
$user->update($input);
DB::table('model_has_roles')->where('model_id',$id)->delete();

$user->assignRole($request->input('roles'));

return redirect()->route('admin.users.index')
->with('success','User updated successfully');
}

public function destroy($id)
{
User::find($id)->delete();
return redirect()->route('admin.users.index')
->with('success','User deleted successfully');
}
}
