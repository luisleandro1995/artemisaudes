<?php

namespace App\Http\Controllers;


use App\Http\Requests\WorkSpaceRequest;
use App\Models\User; 
use App\Models\WorkSpace; 

class WorkSpaceController extends Controller
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
            $ws = WorkSpace::orderBy('id','desc')->paginate(5);
            return view('admin/ws/index', ['workspaces' =>$ws]) ;
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
            $users = User::orderBy('id')->get();

            return view('admin/ws/create', ['users' => $users]);
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

        
    public function store(WorkSpaceRequest $request)
    {
        try
        {
           $ws = new WorkSpace($request->all());
           $ws->save();

           return redirect()->route('workspaces.index');
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function show($workspace)
    {
        try
        {
           
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function edit($workspace)
    {
        try
        {
           
        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function update(WorkSpaceRequest $request, $workspace)
    {
        try
        {

        }
        catch(\Exception $e)
        {
            return view ('welcome');
            

        }
    }

    public function destroy($workspace)
    {
         try
        {
           $ws = WorkSpace::find($workspace);
           $ws->delete();
            
            return redirect()->route('workspaces.index');



        }
        catch(\Exception $e)
        {
            var_dump($e);
            die();
            //return view ('welcome');
            

        }
    }
}

