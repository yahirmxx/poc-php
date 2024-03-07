<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface {
    public function getAll();
    public function getById($id);
    public function create(User $user);
    public function update(User $user);
    public function delete($id);
}