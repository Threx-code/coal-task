<?php

namespace App\Services;

use App\Contracts\ProjectInterface;
use App\Contracts\ProjectServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProjectService implements ProjectServiceInterface
{
    /**
     * @param ProjectInterface $repository
     */
    public function __construct(private ProjectInterface $repository){}

    /**
     * @param $request
     * @return string
     */
    public function createProject($request): string
    {
        return $this->repository->createProject($request);
    }

    /**
     * @param $request
     * @return string
     */
    public function editProject($request): string
    {
        return $this->repository->editProject($request);
    }

    /**
     * @param $request
     * @return string
     */
    public function deleteProject($request): string
    {
        return $this->repository->deleteProject($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getAProject($request): mixed
    {
        return $this->repository->getAProject($request);
    }

    /**
     * @param $request
     * @return LengthAwarePaginator
     */
    public function getAllProjects($request): LengthAwarePaginator
    {
        return $this->repository->getAllProjects($request);
    }

}

