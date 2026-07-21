<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function createUser(string $name, string $email, string $password): User
    {
        $passwordHash = Hash::make($password);

        if ($this->userRepository->emailExists($email)) {
            throw new \Exception('Email já cadastrado');
        }

        return $this->userRepository->create([
            'name' => $name,
            'email' => $email,
            'password' => $passwordHash,

        ]);
    }

    public function validateUser(string $email, string $password): User
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user || !Hash::check($password, $user->password)) {
            throw new \Exception("Usuário ou senha inválidos");
        }

        return $user;
    }

}
