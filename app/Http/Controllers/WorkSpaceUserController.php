<?php

namespace App\Http\Controllers;


use App\Http\Requests\WorkSpaceUserRequest;
use App\Models\User; 
use App\Models\WorkSpace; 
use App\Models\WorkSpaceUser; 

class WorkSpaceUserController extends Controller
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
            $wsu = WorkSpaceUser::orderBy('id','desc')->paginate(5);
            return view('admin/wsu/index', ['workspaceusers' =>$wsu]) ;
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
            $users = User::orderBy('name')->get();
            $workspaces = WorkSpace::orderBy('id')->get();

            return view('admin/wsu/create', ['users' => $users,
                                             'workspaces' => $workspaces]);
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

        
    public function store(WorkSpaceUserRequest $request)
    {
        try
        {
           $wsu = new WorkSpaceUser($request->all());
           $wsu->save();

           return redirect()->route('workspaceuser.index');
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function show($workspaceuser)
    {
        try
        {
           
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function edit($workspaceuser)
    {
        try
        {
           
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function update(WorkSpaceUserRequest $request, $workspaceuser)
    {
        try
        {

        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function destroy($workspaceuser)
    {
         try
        {
           $wsu = WorkSpaceUser::find($workspaceuser);
           $wsu->delete();
            
            return redirect()->route('workspaceuser.index');



        }
        catch(\Exception $e)
        {
            var_dump($e);
            die();
            //return view ('welcome');
            

        }
    }
}

