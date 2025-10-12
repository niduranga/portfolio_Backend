<?php

namespace App\Action\login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    public function __invoke(array $requestData): array
    {
        $email = $requestData['email'];
        $password = $requestData['password'];

        if ($this->isEmail($email)) {
            return $this->isUserAuthenticated($email, $password);
        }

        return [
            'status' => Response::HTTP_UNAUTHORIZED,
            'email' => "Email or password is incorrect"
        ];
    }

    private function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function isUserAuthenticated(string $email, string $password): array
    {
        $user = $this->isUserExist($email);

        if ($user) {
            if ($this->isUserPasswordCorrect($password, $user->password)) {
                return [
                    'status' => Response::HTTP_OK,
                    'user_id' => $user->id,
                    'token' => $user->createToken('token')->plainTextToken
                ];
            }
            else {
                return [
                    'status' => Response::HTTP_BAD_REQUEST,
                    'message' => 'Invalid email or password'
                ];
            }
        }

        return [
            'status' => Response::HTTP_UNAUTHORIZED,
            'message' => 'Invalid email or password'
        ];
    }

    private function isUserExist(string $email)
    {
        return User::where('email', $email)->first();
    }

    private function isUserPasswordCorrect(string $passwordFromUser, string $passwordFromDatabase): bool
    {
        return Hash::check($passwordFromUser, $passwordFromDatabase);
    }
}
