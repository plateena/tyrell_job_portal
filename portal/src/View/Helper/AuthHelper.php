<?php
namespace App\View\Helper;

use Cake\View\Helper;

class AuthHelper extends Helper
{
    public function isLoggedIn()
    {
        $authentication = $this->getView()
            ->getRequest()
            ->getAttribute("authentication");
        $result = $authentication->getResult();
        return $result->isValid();
    }

    public function getLoginLink()
    {
        return $this->getView()->Html->link(
            "Login", [
            "controller" => "Users",
            "action" => "login",
            ]
        );
    }

    public function getLogoutLink()
    {
        return $this->getView()->Html->link(
            "Logout", [
            "controller" => "Users",
            "action" => "logout",
            ]
        );
    }

    public function getUser()
    {
        return $this->getView()->getRequest()->getAttribute('identity');
    }
}
