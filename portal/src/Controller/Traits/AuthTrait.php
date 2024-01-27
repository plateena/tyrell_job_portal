<?php

namespace App\Controller\Traits;

use Cake\Http\Response;

/**
 * AuthTrait
 *
 * This trait provides reusable methods for handling user authentication in CakePHP controllers.
 * It includes methods for handling user login and logout.
 */
trait AuthTrait
{
    /**
     * Handles user login.
     *
     * If the user is already authenticated, redirects them to the appropriate page.
     * If the authentication attempt fails, displays an error message.
     *
     * @return \Cake\Http\Response|null Redirects authenticated users or renders login view.
     */
    public function login(): ?Response
    {
        $result = $this->Authentication->getResult();
        
        // If the user is already authenticated, redirect them
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/home';
            return $this->redirect($target);
        }
        
        // If it's a POST request and the authentication failed, show an error message
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
        
        return null;
    }

    /**
     * Logs the user out and redirects to the login page.
     *
     * @return \Cake\Http\Response Redirects to the login page.
     */
    public function logout(): Response
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
