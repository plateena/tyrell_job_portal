<?php
declare(strict_types=1);

namespace App\Controller;

class HomeController extends AppController
{
    public function index()
    {
        $user = $this->request->getAttribute('identity');
    }
}
