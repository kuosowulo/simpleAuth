<?php

namespace App\Services;

use App\Repositories\AuthRepositary;
use Illuminate\Database\QueryException;
use App\Exceptions\RegisterException;

class AuthService
{
    protected $authRepo;

    public function __construct(AuthRepositary $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    public function register($credential)
    {
        return $this->authRepo->create($credential);

        try {
            return $this->authRepo->create($credential);
        } catch (\Exception $e) {
            if ($e instanceof QueryException) {
                throw new RegisterException('unknown');
            }
        }
    }
}
