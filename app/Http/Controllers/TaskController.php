<?php

namespace App\Http\Controllers;

use App\Models\Task;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    protected $route = 'tasks';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new Task();
        $categories = Category::all();
        return view($this->route . '.create', ['route' => $this->route, 'item' => $item, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'taskname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('task_images', 'public');
        }

        Task::create($data);

        return redirect()->route('home')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $item = Task::findOrFail($id);
        $categories = Category::all();
        return view($this->route . '.edit', ['route' => $this->route, 'item' => $item, 'categories' => $categories]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'taskname' => 'required|string|max:255',
            'description' => 'nullable|string',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('task_images', 'public');
        }

        $task->update($data);

        return redirect()->route('home')->with('success', 'Task updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $taskIds = explode(',', $request->task_ids);
        Task::whereIn('id', $taskIds)->delete();
        return redirect()->route('home')->with('success', 'Selected tasks deleted successfully.');
    }
    public function export()
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }
}
