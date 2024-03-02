@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')

    <form action="" method="POST">
        <div class="card-body">
            @include('admin.alert')
            <div class="form-group">
                <label for="menu">Ten Danh Muc</label>
                <input type="text" name="name" value="{{$menu->name}}" class="form-control" placeholder="Enter ten danh muc">
            </div>

            <div class="form-group">
                <label>Danh Muc</label>
                <select class="form-control" name="parent_id" >
                    <option value="0"{{$menu->parent_id===0?'selected':''}}>
                        Danh Muc Cha
                    </option>
                    @foreach($menus as $menuParent)
                        <option value="{{$menuParent->id}}" {{$menu->parent_id===$menuParent->id?'selected':''}}>{{$menuParent->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mo Ta</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Mo Ta Chi Tiet</label>
                <textarea name="content" id="content" class="form-control">{{$menu->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Kich Hoat</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1"  type="radio" id="active" name="active" {{$menu->active===1?'checked=""':''}}>
                    <label for="active" class="custom-control-label">Co</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{$menu->active===0?'checked=""':''}}>
                    <label for="no_active" class="custom-control-label">Khong</label>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Danh Muc</button>
            </div>
        </div>
        @csrf
    </form>

@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection

