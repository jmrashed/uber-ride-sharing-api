<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        return response()->json($user);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->createUser($data);
        return response()->json($user, 201);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();
        $user = $this->userService->getUserById($id);
        $user = $this->userService->updateUser($user, $data);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = $this->userService->getUserById($id);
        $this->userService->deleteUser($user);
        return response()->json(null, 204);
    }
}