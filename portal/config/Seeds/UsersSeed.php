<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void {
        $defaultPasswordHasher = new DefaultPasswordHasher();

        $userData = [
            "email" => "admin@example.com",
            "password" => $defaultPasswordHasher->hash("password"),
            "created" => date("Y-m-d H:i:s"),
            "modified" => date("Y-m-d H:i:s"),
        ];

        $userTable = $this->table("users");
        $userTable->insert($userData)->save();
    }
}
