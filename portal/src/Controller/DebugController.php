<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class DebugController extends AppController
{
    public function test1()
    {
        $this->Jobs = $this->fetchTable('Jobs');
        $query = $this->Jobs->find();
        $query->contain([
                'JobsPersonalities',
            'JobsPersonalities.Personalities']);
        $query->select(
            [
                // 'JobsPersonalities.Personalities.name',
                'Jobs.id',
            ]
        );
        $sql = $query->sql();
        $jobs = $this->paginate($query);

        // @TODO: <zainundin: 28-01-2024> remove this debug code
        dd([$jobs, $sql]);
    }
}
