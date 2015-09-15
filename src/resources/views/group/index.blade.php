<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="content">
    <div class="col-md-12">
        <a href="{{ route('group.create') }}" class="btn btn-success pull-right">Add Group</a>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Group</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('group.edit', ['id' => $group->id]) }}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('group.destroy', ['id' => $group->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
