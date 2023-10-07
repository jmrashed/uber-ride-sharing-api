<?php


namespace App\Services;
 
use App\Models\User;
use App\Interfaces\UserInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser(array $data)
    {
        return $this->userRepository->createUser($data);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->userRepository->updateUser($user, $data);
    }

    public function deleteUser(User $user)
    {
        $this->userRepository->deleteUser($user);
    }
}