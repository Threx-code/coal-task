<?php

namespace App\Services;

use App\Contracts\TaskInterface;
use App\Contracts\TaskServiceInterface;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskService implements TaskServiceInterface
{
    /**
     * @param TaskInterface $repository
     */
    public function __construct(private TaskInterface $repository){
    }

    /**
     * @param $request
     * @return mixed|string
     * @throws Exception
     */
    public function createTask($request): mixed
    {
        return $this->repository->createTask($request);
    }

    /**
     * @param $request
     * @return string
     * @throws Exception
     */
    public function editTask($request): string
    {
        return $this->repository->editTask($request);
    }

    /**
     * @param $request
     * @return string
     */
    public function deleteTask($request): string
    {
        return $this->repository->deleteTask($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getATask($request): mixed
    {
        return $this->repository->getATask($request);
    }

    /**
     * @param $request
     * @return LengthAwarePaginator
     */
    public function getAllTasks($request): LengthAwarePaginator
    {
        return $this->repository->getAllTasks($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getAProjectTasks($request): mixed
    {
        return $this->repository->getAProjectTasks($request);
    }


}
