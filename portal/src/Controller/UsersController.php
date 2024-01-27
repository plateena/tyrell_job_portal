<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Traits\AuthTrait;
use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Include methods for user authentication.
     *
     * This trait provides reusable methods for handling user authentication in CakePHP controllers.
     * It includes methods for handling user login and logout.
     *
     * @method login() Handles user login.
     * @method logout() Logs the user out and redirects to the login page.
     */
    use AuthTrait;

    /**
     * Before filter method.
     *
     * @param  \Cake\Event\EventInterface $event The event object.
     * @return \Cake\Http\Response|null Returns null or redirects to login if unauthenticated.
     */
    public function beforeFilter(EventInterface $event): ?Response
    {
        // Call the parent class's beforeFilter method
        parent::beforeFilter($event);

        // Allow unauthenticated access to the 'login' action
        $this->Authentication->allowUnauthenticated(["login", "index"]);

        return null;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact("users"));
    }

    /**
     * View method
     *
     * @param  string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact("user"));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is("post")) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("The user has been saved."));

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __("The user could not be saved. Please, try again.")
            );
        }
        $this->set(compact("user"));
    }

    /**
     * Edit method
     *
     * @param  string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(["patch", "post", "put"])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("The user has been saved."));

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __("The user could not be saved. Please, try again.")
            );
        }
        $this->set(compact("user"));
    }

    /**
     * Delete method
     *
     * @param  string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $user = $this->Users->get($id);
        if ($this->Users->trash($user)) {
            $this->Flash->success(__("The user has been deleted."));
        } else {
            $this->Flash->error(
                __("The user could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "index"]);
    }
}
