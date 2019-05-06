<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/service';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();

        return response()->json(['success'=>true, 'message'=>'User information successfully updated']);
    }

    public function user_info(Request $request)
    {
        $user = User::find($request->id);

        return $user;

        // return  response()->json([$user]);
    }

    public function store(Request $request)
    {
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());

        return response()->json(['success'=> true, 'message'=> 'User successfully added']);
    }

    public function dataTable()
    {
        $user = User::all();
        return Datatables::of($user)
        ->editColumn('date', function($user){
            return $user->created_at->format('d-M-Y');
        })
        ->editColumn('action', function($user){

            $current_user =  Auth::user()->id;

            $disable = $user->id == $current_user ? 'disabled' : '';

             return '<a href="#update-user" data-toggle="modal" onclick="editUser('.$user->id.')" class="btn btn-xs btn-link"><span class="fa fa-pencil"></span> edit</a>
                    <a id="btn-delete-user" '.$disable.' data-id="'.$user->id.'" onclick="deleteUser(this)" class="btn btn-xs btn-danger btn-link"><span class="fa fa-trash"></span> delete</a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function index()
    {
        $users = User::all();


        return view('auth.index', ['users'=>$users]);
    }

    public function delete(Request $request)
    {

        $user = User::destroy($request->id);

        return response()->json(['success'=>true, 'message'=>' user successfully deleted']);
    }

    public function password(Request $request)
    {
        if ($request->new_password) {
            $user = Auth::user();
            $user = User::find($user->id);
            $user->password = bcrypt($request->new_password);
            $user->save();

            return response()->json(['success'=>true, 'message'=> 'Password successfully updated.']);
        }
    }

    public function checkusername(Request $request)
    {
        if($request->username){
         $valid = true;
            if(User::Where('username', $request->username)->exists()){
                $valid = false;
            }
              return response()->json(['valid'=>$valid]);

        }
    }

    public function checkpassword(Request $request)
    {

        $valid = FALSE;
        $data = array();
        $user = Auth::user();


        if($request->current_password){
           $user = User::find($user->id);
           if (Hash::check($request->current_password, $user->password))
           {
            $valid = true;
           }

           return response()->json(['valid'=>$valid]);

        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
