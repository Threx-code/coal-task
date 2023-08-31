<?php

namespace App\Http\Controllers\Tasks;

use App\Contracts\ProjectInterface;
use App\Contracts\ProjectServiceInterface;
use App\Contracts\TaskInterface;
use App\Contracts\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\tasks\DeleteTaskRequest;
use App\Http\Requests\tasks\TaskCreateRequest;
use App\Http\Requests\tasks\UpdateTaskRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @param TaskServiceInterface $taskService
     * @param ProjectServiceInterface $projectService
     */
    public function __construct(private TaskServiceInterface $taskService, private ProjectServiceInterface $projectService){}

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $projects = $this->projectService->getAllProjects($request);
        return view('tasks.index', compact('projects'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function allTasks(Request $request): View|Factory|Application
    {
        $tasks = $this->taskService->getAllTasks($request);
        $projects = $this->projectService->getAllProjects($request);

        return view('tasks.all-tasks', compact('tasks', 'projects'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getAProjectTasks(Request $request): View|Factory|Application
    {
        $tasks = $this->taskService->getAProjectTasks($request);
        return view('tasks.specific-project', compact('tasks'));
    }

    /**
     * @param TaskCreateRequest $request
     * @return mixed|string
     * @throws Exception
     */
    public function store(TaskCreateRequest $request): mixed
    {
        return $this->taskService->createTask($request);

    }


    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getATask(Request $request): View|Factory|Application
    {
        $task = $this->taskRepository->getATask($request);
        $projects = $this->projectRepository->getAllProjects($request);
        return view('tasks.task', compact('task', 'projects'));
    }

    /**
     * @param UpdateTaskRequest $request
     * @return mixed
     */
    public function update(UpdateTaskRequest $request): mixed
    {
        return $this->taskRepository->editTask($request);
    }

    /**
     * @param DeleteTaskRequest $request
     * @return mixed
     */
    public function delete(DeleteTaskRequest $request): mixed
    {
        return $this->taskRepository->deleteTask($request);
    }


}
