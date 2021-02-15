<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Managers\UserManager;
use App\Managers\PasswordManager;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    function __construct(UserRepository $userRepository,RoleRepository $roleRepository) {
        $this->userRepository = $userRepository;
        $this->roleRepository=$roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
        return view('users.index')->with('users', $users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('users.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suser = $this->userRepository->newUser();
        $suser->status = $request->get('status');
        $response = $request->all();
        $manager = new UserManager($suser);
        $manager->setData($response);
        if ($manager->save()) {
            $user = $manager->getModel();
            // role_user
            $roles = $request->get('roles');
            $permission = $this->roleRepository->find($roles);

            $user->roles()->save($permission);
            
            flash('¡Usuario CREADO correctamente!', 'success');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withInput()->withErrors($manager->getValidation());
        }
    }
    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->roleRepository->findAllByStatusActive();
        $suser = $this->userRepository->find($id);
        $view = view('users.edit');
        $view->with('user', $suser);
        $view->with('roles', $roles);
        return $view;
    }
    
    public function editPassword($id){
        $suser = $this->userRepository->find($id);
        $view = view('auth.edit');
        $view->with('user', $suser);
        return $view;
    }
    
    public function updatePassword(Request $request, $id)
    {
        $suser = $this->userRepository->find($id);
        $suser->status = $request->get('status');
        $response = $request->all();
        $manager = new PasswordManager($suser);
        $manager->setData($response);
        

        if ($manager->save()) {
            $user = $manager->getModel();
            // role_user
            $user->roles()->detach();
            $roles = $request->get('roles');
            $permission = $this->roleRepository->find($roles);
            $user->roles()->save($permission);
            flash('¡Contraseña MODIFICADA Correctamente', 'info');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withInput()->withErrors($manager->getValidation());
        }
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
        $suser = $this->userRepository->find($id);
        $suser->status = $request->get('status');

        $response = $request->all();
        $manager = new UserManager($suser);
        $manager->setData($response);

        if ($manager->save()) {
            $user = $manager->getModel();
            // role_user
            $user->roles()->detach();
            $roles = $request->get('roles');
            $permission = $this->roleRepository->find($roles);
            $user->roles()->save($permission);
            
            flash('¡Usuario MODIFICADO correctamente!', 'success');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withInput()->withErrors($manager->getValidation());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function status($id) {
        $suser = $this->userRepository->find($id);
        $manager = new UserManager($suser);
        $message = $manager->status();
        flash($message, 'success');
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
         $user = $this->userRepository->find($id);
        return view ('users.show')->with('user',$user);

    }
}
