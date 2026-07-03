<?php

    namespace App\Repositories;

    use App\Models\User;

    class UserRepository
    {
        public function create(array $data): User
        {
            return User::create($data);
        }

        public function emailExists(string $email): bool 
        {
            return User::where('email', $email)
            ->exists();
        }
        
        public function findByEmail(string $email): ?User
        {
            return User::where('email', $email)->first();
        }
    }