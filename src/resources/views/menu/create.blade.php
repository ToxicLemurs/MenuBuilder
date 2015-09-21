<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<div class="col-md-12">
    <form method="POST" class="form form-horizontal" action="@if(isset($item)) {{ route('menu.update', ['id' => $item->id]) }} @else {{ route('menu.store') }} @endif">
        <div class="form-group">
            <label class="col-md-2 control-label" for="group_id">Menu Group</label>
            <div class="col-md-10">
                <select name="group_id" id="group_id" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}" @if(isset($item) && $item->group_id === $group->id) selected="selected" @endif>{{ $group->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('group_id'))
                    <span class="text-danger">{{ $errors->first('group_id') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="order">Display Order</label>
            <div class="col-md-10">
                <input class="form-control" name="order" id="order" value="@if(isset($item)){{ $item->order }}@endif">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="parent">Menu Parent</label>
            <div class="col-md-10">
                <select name="parent" id="parent" class="form-control">
                    <option value="">None</option>
                    @foreach($items as $menuItem)
                        <option value="{{ $menuItem->id }}" @if(isset($item) && $item->parent === $menuItem->id) selected="selected" @endif>{{ ToxicLemurs\MenuBuilder\models\Group::getGroupName($menuItem->group_id) }} - {{ $menuItem->title }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Display Title</label>
            <div class="col-md-10">
                <input class="form-control" name="title" id="title" value="@if(isset($item)){{ $item->title }}@endif">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="path">URL</label>
            <div class="col-md-10">
                <input class="form-control" name="path" id="path" value="@if(isset($item)){{ $item->path }}@endif">
                @if($errors->has('path'))
                    <span class="text-danger">{{ $errors->first('path') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="active">Active</label>
            <div class="col-md-10">
                <select name="active" id="active" class="form-control">
                    <option value="1" @if(isset($item) && $item->active === 1) selected="selected" @endif>Yes</option>
                    <option value="0" @if(isset($item) && $item->active === 0) selected="selected" @endif>No</option>
                </select>
                @if($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="class">CSS Class</label>
            <div class="col-md-10">
                <input class="form-control" name="class" id="class" value="@if(isset($item)){{ $item->class }}@endif">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="icon">CSS Icon</label>
            <div class="col-md-10">
                <input class="form-control" name="icon" id="icon" value="@if(isset($item)){{ $item->icon }}@endif">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="small_class">CSS small Class</label>
            <div class="col-md-10">
                <input class="form-control" name="small_class" id="small_class" value="@if(isset($item)){{ $item->small_class }}@endif">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="mdall_text">CSS small Text</label>
            <div class="col-md-10">
                <input class="form-control" name="small_text" id="small_text" value="@if(isset($item)){{ $item->small_text }}@endif">
            </div>
        </div>

        <div class="clearfix"></div>

        <input type="hidden" name="_token" value="<?= csrf_token(); ?>">
        <input type="submit" class="btn btn-success" value="@if(isset($item)) Update @else Create @endif Menu Item">
        <a href="{{ route('menu.index') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>