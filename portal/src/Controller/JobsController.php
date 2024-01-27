<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Jobs Controller
 *
 */
class JobsController extends AppController
{
    public $helpers = ["MyUrl"];

    /**
     * Index method
     *
     * Retrieve jobs and paginate the results with the closest limit option to the 'per_page' query parameter.
     * Default limit options are 20, 50, and 100 per page.
     *
     * @return void
     */
    public function index()
    {
        // Define pagination options
        $limitOptions = [20, 50, 100];
        $defaultLimit = 20;

        // Retrieve limit from URL query parameter 'per_page'
        $requestedLimit = $this->request->getQuery("per_page", $defaultLimit);

        // Find the closest limit option
        $closestLimit = $defaultLimit;

        $closestDifference = PHP_INT_MAX;
        foreach ($limitOptions as $option) {
            $difference = abs($requestedLimit - $option);
            if ($difference < $closestDifference) {
                $closestLimit = $option;
                $closestDifference = $difference;
            }
        }

        // Retrieve jobs sorted by sort_order and paginate with the closest limit option
        $query = $this->Jobs->find()->order(["sort_order" => "ASC"]);
        $jobs = $this->paginate($query, [
            "limit" => $closestLimit,
            "maxLimit" => 100,
        ]);

        // Set pagination options to be passed to the view
        $this->set(compact("jobs", "limitOptions", "defaultLimit"));
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, contain: []);
        $this->set(compact("job"));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEmptyEntity();
        if ($this->request->is("post")) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__("The job has been saved."));

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __("The job could not be saved. Please, try again.")
            );
        }
        $this->set(compact("job"));
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, contain: []);
        if ($this->request->is(["patch", "post", "put"])) {
            $job = $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                $this->Flash->success(__("The job has been saved."));

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __("The job could not be saved. Please, try again.")
            );
        }
        $this->set(compact("job"));
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success(__("The job has been deleted."));
        } else {
            $this->Flash->error(
                __("The job could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "index"]);
    }
}
