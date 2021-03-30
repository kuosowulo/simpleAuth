<?php

namespace App\Repositories;
use App\User;

class AuthRepositary
{
    public function create($data)
    {
        $user_model = new User();
        $user_model->name = "default";
        $user_model->email = $data['email'];
        $user_model->password = bcrypt($data['password']);

        return $user_model->save();
    }
}
