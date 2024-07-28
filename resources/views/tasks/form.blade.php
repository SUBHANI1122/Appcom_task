<div class="form-group">
    <label for="taskname">Task Name</label>
    <input type="text" class="form-control" name="taskname" placeholder="Enter Name of Task" required value="{{ old('taskname', $item ? $item->taskname : '') }}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="3" placeholder="Type some details about the task">{{ old('description', $item ? $item->description : '') }}</textarea>
    <small id="emailHelp" class="form-text text-muted">(Optional)</small>
</div>

<div class="form-group">
    <label for="startdate">Start Date</label>
    <input type="date" class="form-control" name="startdate" placeholder="start date" required value="{{ old('startdate', $item ? $item->startdate : '') }}">
</div>

<div class="form-group">
    <label for="enddate">End Date</label>
    <input type="date" class="form-control" name="enddate" placeholder="end date" required value="{{ old('enddate', $item ? $item->enddate : '') }}">
</div>
<div class="form-group">
    <label for="category">Select Category</label>
    <select class="form-control" name="category_id" id="category_id" required>
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if (old('category_id', $item ? $item->category_id : '') == $category->id) selected @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="form-label-group">
        <input type="file" id="image" name="image" class="form-control" placeholder="Task Image" required="required">
        <label for="image">Task Image</label>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

