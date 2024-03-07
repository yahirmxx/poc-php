<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController {
    protected $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(Request $request, Response $response, $args) {
        $users = $this->userRepository->getAllUsers();
        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }

    // Implement other CRUD operations
}
?>
