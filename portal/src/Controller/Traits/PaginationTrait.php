<?php
namespace App\Controller\Traits;

use Cake\Datasource\QueryInterface;
use Cake\Http\Exception\InternalErrorException;

trait PaginationTrait
{
    /**
     * Paginate a query with the closest limit option.
     *
     * @param  QueryInterface $query        The query to paginate.
     * @param  array          $limitOptions The available limit options. Optional, default is [20, 50, 100].
     * @param  int            $defaultLimit The default limit. Optional, default is 20.
     * @return mixed Paginated results.
     * @throws InternalErrorException When $this->paginate method does not exist.
     */
    public function paginateWithClosestLimit(
        QueryInterface $query,
        int $defaultLimit = 50,
        array $limitOptions = [20, 50, 100]
    ) {
        if (!method_exists($this, "paginate")) {
            throw new InternalErrorException(
                "Pagination method is not available in the controller."
            );
        }

        // Retrieve limit from URL query parameter 'per_page'
        if (!method_exists($this, "request")) {
            $requestedLimit = $this->request->getQuery(
                "per_page",
                $defaultLimit
            );
        } else {
            $requestedLimit = $defaultLimit;
        }

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

        return $this->paginate(
            $query, [
            "limit" => $closestLimit,
            ]
        );
    }
}
