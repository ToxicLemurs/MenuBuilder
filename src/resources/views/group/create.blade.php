<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="col-md-12">
    <form method="POST" class="form form-horizontal" action="@if(isset($group)) {{ route('group.update', ['id' => $group->id]) }} @else {{ route('group.store') }} @endif">
        <div class="form-group">
            <label class="col-md-2 control-label" for="name">*Group Name</label>
            <div class="col-sm-10">
                <input name="name" id="name" type="text" class="form-control" value="@if(isset($group)){{ $group->name }}@endif">
                @if(count($errors))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>

        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        <input type="submit" class="btn btn-success" value="@if(isset($group)) Update @else Create @endif Group">
        <a href="{{ route('group.index') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>