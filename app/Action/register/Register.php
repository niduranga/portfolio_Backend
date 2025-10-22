<?php

namespace App\Action\register;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class Register
{
    public function __invoke(array $requestData): array
    {
        $email = $requestData['email'];
        $password = $requestData['password'];
        $name = $requestData['name'];

        if ($this->isValidEmail($email)) {
            $this->registerUser($email, $password, $name);
        }

        return [
            'status' => Response::HTTP_UNAUTHORIZED,
            'email' => "Email or password is already expired"
        ];
    }

    private function isValidEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function registerUser(string $email, string $password, string $name): array
    {
        $user = $this->isUserExists($email);
        if (!$user) {
            $Admin = User::create([
                'email' => $email,
                'password' => $password,
                'name' => $name,
            ]);

            return [
                'message' => 'Admin registered successfully',
                'Admin_id' => $Admin->id,
            ];
        }

        return [
            'message' => 'Admin already exists',
        ];
    }
    private function isUserExists(string $email): bool
    {
        return User::where('email', $email)->first() !== null;
    }
}
