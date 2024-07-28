$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#categoryForm').on('submit', function (e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            type: 'POST',
            url: '/categories',
            data: {
                name: $('input[name="name"]').val(),
                description: $('textarea[name="description"]').val()
            },
            success: function (response) {
                alert(response.message);
                $('#addCategoryModal').modal('hide');
                form.reset();
            },
            error: function (error) {
                alert('Something went wrong. Please try again.');
            }
        });
    });
});

$(document).ready(function () {
    $('#deleteSelectedTasksButton').on('click', function () {
        var selectedTaskIds = [];
        $('.task-checkbox:checked').each(function () {
            selectedTaskIds.push($(this).data('id'));
        });
        if (selectedTaskIds.length === 0) {
            alert('Please select at least one task to delete.');
            return;
        }
        $('#task_ids').val(selectedTaskIds.join(','));
        $('#confirmModal').modal('show');
    });

    $('#confirmDeleteButton').on('click', function () {
        $('#deleteTasksForm').submit();
    });
});



