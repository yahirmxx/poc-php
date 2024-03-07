<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Db\Database;

class UserRepositoryTest extends TestCase {

    protected $userRepository;

    protected function setUp(): void {
        $this->db = new Database(); // You might need to mock the database connection
        $this->userRepository = new UserRepository($this->db);
    }

    public function testCreateUser() {
        $user = new User();
        $user->username = 'john_doe';
        $user->email = 'john@example.com';

        $this->userRepository->create($user);

        // Assuming that create method sets user's ID
        $this->assertNotNull($user->id);
    }

    public function testGetUserById() {
        $user = new User();
        $user->username = 'jane_doe';
        $user->email = 'jane@example.com';

        $this->userRepository->create($user);
        $userId = $user->id;

        $retrievedUser = $this->userRepository->getById($userId);

        $this->assertEquals($user->username, $retrievedUser->username);
        $this->assertEquals($user->email, $retrievedUser->email);
    }
}

