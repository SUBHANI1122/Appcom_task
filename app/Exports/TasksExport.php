<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;

class TasksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Task::with('category')->get(['taskname', 'description', 'startdate', 'enddate', 'category_id']);
    }

    public function headings(): array
    {
        return [
            'Task Name',
            'Description',
            'Start Date',
            'End Date',
            'Category Name',
        ];
    }

    public function map($task): array
    {
        return [
            $task->taskname,
            $task->description,
            \Carbon\Carbon::parse($task->startdate)->format('F j, Y'),
            \Carbon\Carbon::parse($task->enddate)->format('F j, Y'),
            $task->category ? $task->category->name : 'N/A',
        ];
    }
}
