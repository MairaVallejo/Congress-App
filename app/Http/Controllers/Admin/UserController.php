<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usersFilteredAndPaginated = User::whenEmail($request->email)->whenCondition($request->condicion)->paginate();
        return view('dashboard.admin.users.index', [
            'filterOptions' => [
                'condicion' => [
                    'selected' => $request->condicion,
                    'options' => [
                        '' => 'Todos',
                        Str::lower(User::CONDITION_SUPER_ADMIN) => Str::title(User::CONDITION_SUPER_ADMIN),
                        Str::lower(User::CONDITION_ADMIN) => Str::title(User::CONDITION_ADMIN),
                        Str::lower(User::CONDITION_PROVIDER) => Str::title(User::CONDITION_PROVIDER),
                    ]
                ]
            ],
            'data' => $usersFilteredAndPaginated
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.users.create', [
            'filterOptions' => [
                'condicion' => [
                    'selected' => Str::lower(User::CONDITION_PROVIDER),
                    'options' => [
                        Str::lower(User::CONDITION_SUPER_ADMIN) => Str::title(User::CONDITION_SUPER_ADMIN),
                        Str::lower(User::CONDITION_ADMIN) => Str::title(User::CONDITION_ADMIN),
                        Str::lower(User::CONDITION_PROVIDER) => Str::title(User::CONDITION_PROVIDER),
                    ]
                ]
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = array_filter($request->all());
        if (Arr::has($input, 'password')) {
            $input['password'] = Hash::make($input['password']);
        }
        $usuario = User::create($input);
        $usuario->syncRoles(Str::lower(User::CONDITION_PROVIDER) === $input['role'] ? [] : [$input['role']]);
        return redirect()->route('admin.usuarios.index')->with('status', 'Usuario creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $usuario)
    {
        return view('dashboard.admin.users.edit', [
            'filterOptions' => [
                'condicion' => [
                    'selected' => Str::lower($usuario->roles->first()?->name ?? User::CONDITION_PROVIDER),
                    'options' => [
                        Str::lower(User::CONDITION_SUPER_ADMIN) => Str::title(User::CONDITION_SUPER_ADMIN),
                        Str::lower(User::CONDITION_ADMIN) => Str::title(User::CONDITION_ADMIN),
                        Str::lower(User::CONDITION_PROVIDER) => Str::title(User::CONDITION_PROVIDER),
                    ]
                ]
            ],
            'data' => $usuario
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $usuario)
    {
        $input = array_filter($request->all());
        if (Arr::has($input, 'password')) {
            $input['password'] = Hash::make($input['password']);
        }
        if (Arr::has($input, 'role')) {
            $usuario->syncRoles(Str::lower(User::CONDITION_PROVIDER) === $input['role'] ? [] : [$input['role']]);
        }
        $usuario->update($input);
        $usuario->save();
        return redirect()->route('admin.usuarios.index')->with('status', 'Usuario actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('status', 'Usuario eliminado!');
    }
}
