<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypeRequest;
use App\Models\UserType; 

class UserTypeController extends Controller
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
            $userTypes = UserType::orderBy('id','desc')->paginate(5);
            return view('admin/usertypes/index', ['usertypes' =>$userTypes]) ;
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
            return view('admin/usertypes/create');
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    
    public function store(UserTypeRequest $request)
    {
        try
        {
           $userType = new UserType($request->all());
           $userType->save();

           return redirect()->route('usertypes.index');
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function show($usertype)
    {
        try
        {
           $vuserType = UserType::find($usertype);
            if($vuserType)
            {
                return view ('admin/usertypes/view', ['usertype' => $vuserType]);
            }
            else
            {
                return view ('admin/usertypes/index');
            }
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function edit($usertype)
    {
        try
        {
           $vuserType = UserType::find($usertype);
            if($vuserType)
            {
                return view ('admin/usertypes/update', ['usertype' => $vuserType]);
            }
            else
            {
                return view ('admin/usertypes/index');
            }
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function update(UserTypeRequest $request, $usertype)
    {
        try
        {
           $vuserType = UserType::find($usertype);
           $vuserType->fill($request->all());
           $vuserType->save();

            return redirect()->route('usertypes.index');


        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function destroy($usertype)
    {
         try
        {
           $vuserType = UserType::find($usertype);
           $users = $vuserType->users()->get();

           if(count($users) == 0)
           $vuserType->delete();
            
            return redirect()->route('usertypes.index');



        }
        catch(\Exception $e)
        {
            var_dump($e);
            die();
            //return view ('welcome');
            

        }
    }
}

