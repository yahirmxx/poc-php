<?php

namespace App\Repositories;

use App\Models\User;
use App\Db\Database;

class UserRepository implements UserRepositoryInterface {
    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAll() {
    }

    public function getById($id) {
    }

    public function create(User $user) {
    }

    public function update(User $user) {
    }

    public function delete($id) {
    }
}

