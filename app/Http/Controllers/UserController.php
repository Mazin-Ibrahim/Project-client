<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Permission;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function index()
    {
        $users = User::where('is_deleted',0)->paginate(9);
        Alert::success('Success Title', 'Success Message');
        return view('user.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

/** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
            
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);

    
         $user->save();
         $user->attachRole('user');
        //  notify()->success('تم الحفظ ⚡️');
         Session::flash('success','تم حفظ البيانات');
         return redirect()->route('users.index');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    { 
        $user = User::findOrFail($id);
        $permissions = Permission::all();

        return view('user.edit')->withUser($user)->withPermissions($permissions);
         
        // dd();

        //  $user->attachPermission($permission);

        //  $permission = $user->permissions()->get();

        //  dd($permission);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->status = $request->status;
        $user->save();
        $user->syncPermissions($request->check);
        // notify()->success('تم التحرير ⚡️');
        Session::flash('success','تم تعديل البيانات');
        return redirect()->route('users.index');
         

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->is_deleted = 1;

        $user->save();
        // notify()->success('تم الحذف ⚡️');
        Session::flash('success','تم حذف البيانات');
        return redirect()->route('users.index');
    }

    /**
     * get auth user permissions .
     *
     * @param  string   $type
     * @return \Illuminate\Http\Response
     */
    public function getPermissions(string $type)
    {
        $result = [];
        
        switch($type){
            case 'towns':
                if(auth()->user()->hasPermission('edit-town')){
                    $result['edit'] = true;
                }else{
                    $result['edit'] = false;
                }
                if(auth()->user()->hasPermission('delete-town')){
                    $result['delete'] =  true;
                }else{
                    $result['delete'] = false;
                }
            break;

            case 'clients':
                if(auth()->user()->hasPermission('edit-client')){
                    $result['edit'] = true;
                }else{
                    $result['edit'] = false;
                }
                if(auth()->user()->hasPermission('delete-client')){
                    $result['delete'] =  true;
                }else{
                    $result['delete'] = false;
                }

            break;
        }
        return $result;
    }
}
