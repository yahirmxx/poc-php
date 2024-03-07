<?php

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {

    protected $baseUrl = 'http://localhost/api/';

    public function testGetUsers() {
        $response = file_get_contents($this->baseUrl . 'users.php');

        // Assuming response is in JSON format
        $users = json_decode($response, true);

        $this->assertNotEmpty($users);
        // Add more assertions based on the response structure
    }

    public function testCreateUser() {
        $data = [
            'username' => 'test_user',
            'email' => 'test@example.com'
        ];

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($this->baseUrl . 'users.php', false, $context);

        // Assuming the response contains newly created user details
        $newUser = json_decode($response, true);

        $this->assertEquals($data['username'], $newUser['username']);
        $this->assertEquals($data['email'], $newUser['email']);
    }
}
?>
