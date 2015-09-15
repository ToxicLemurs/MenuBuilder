<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="content">
    <div class="col-md-12">
        <a href="{{ route('menu.create') }}" class="btn btn-success pull-right">Add Menu Item</a>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Group</th>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Path</th>
                    <th>Parent</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ \ToxicLemurs\MenuBuilder\models\Group::getGroupName($item->group_id) }}</td>
                        <td>{{ (int) $item->order }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->path }}</td>
                        <td>{{ \ToxicLemurs\MenuBuilder\models\Menu::getMenuTitle($item->parent) }}</td>
                        <td>{{ (bool) $item->active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a class="btn btn-sm btn-info" href="{{ route('menu.edit', ['id' => $item->id]) }}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="{{ route('menu.destroy', ['id' => $item->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
