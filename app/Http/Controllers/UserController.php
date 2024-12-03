<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\User; 
use App\Models\UserType; 

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        try
        {
            $users = User::orderBy('id','desc')->paginate(5);
            return view('admin/users/index', ['users' =>$users]) ;
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function create()
    {
        try
        {
            $userTypes = UserType::orderBy('id')->get();

            return view('admin/users/create', ['usertypes' => $userTypes]);
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

        
    public function store(UserRequest $request)
    {
        try
        {
           $user = new User($request->all());
           $user->state = "activo";
           $user->email = $user->email . "@mail.udes.edu.co";
           $user->password = Hash::make($user->password);
           $user->save();

           return redirect()->route('users.index');
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function show($user)
    {
        try
        {
           $vuser = User::find($user);
           $userTypes = UserType::orderBy('id')->get();

            if($vuser)
            {
                return view ('admin/users/view', ['user' => $vuser,
                                                  'usertypes'=> $userTypes]);
            }
            else
            {
                return view ('admin/users/index');
            }
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function edit($user)
    {
        try
        {
           $vuser = User::find($user);
           $userTypes = UserType::orderBy('id')->get();

            if($vuser)
            {
                return view ('admin/users/update', ['user' => $vuser,
                                                  'usertypes'=> $userTypes]);
            }
            else
            {
                return view ('admin/users/index');
            }
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function update(UserRequest $request, $user)
    {
        try
        {
           $vuser = User::find($user);
           $vuser->fill($request->all());
           $vuser->email = $vuser->email . "@mail.udes.edu.co";
           $vuser->password = Hash::make($vuser->password);
           $vuser->save();

            return redirect()->route('users.index');


        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function destroy($user)
    {
         try
        {
           $vuser = User::find($user);
           $workspaces = $vuser->workspaces()->get();
           $forms = $vuser->forms()->get();

           if(count($workspaces) == 0 && count($forms) == 0) 
           $vuser->delete();
            
            return redirect()->route('users.index');



        }
        catch(\Exception $e)
        {
            var_dump($e);
            die();
            //return view ('welcome');
            

        }
    }
}

