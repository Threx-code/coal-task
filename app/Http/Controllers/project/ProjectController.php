<?php

namespace App\Http\Controllers\project;

use App\Contracts\ProjectServiceInterface;
use App\Http\Requests\project\ProjectCreateRequest;
use App\Http\Requests\project\ProjectDeleteRequest;
use App\Http\Requests\project\ProjectUpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController
{
    /**
     * @param ProjectServiceInterface $service
     */
    public function __construct(private ProjectServiceInterface $service){}

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        return view('projects.index');
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function getAllProjects(Request $request): Factory|View|Application
    {
        $projects = $this->service->getAllProjects($request);
        return view('projects.all-projects', compact('projects'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getAProject(Request $request): View|Factory|Application
    {
        $project = $this->service->getAProject($request);
        return view('projects.project', compact('project'));
    }

    /**
     * @param ProjectCreateRequest $request
     * @return mixed
     */
    public function store(ProjectCreateRequest $request): mixed
    {
        return $this->service->createProject($request);

    }

    /**
     * @param ProjectUpdateRequest $request
     * @return mixed
     */
    public function update(ProjectUpdateRequest $request): mixed
    {
        return $this->service->editProject($request);
    }

    /**
     * @param ProjectDeleteRequest $request
     * @return mixed
     */
    public function delete(ProjectDeleteRequest $request): mixed
    {
        return $this->service->deleteProject($request);
    }


}

