@extends('admin.main')
@section('ckeditor')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
@section('contents')

        <form action="" method="POST">
            <div class="card-body">
                    @include('admin.alert')
                        <div class="form-group">
                            <label for="menu">Ten Danh Muc</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ten danh muc">
                        </div>

                        <div class="form-group">
                            <label for="menu">Danh Muc</label>
                           <select class="form-control" name="parent_id" >
                               <option value="0">
                                   Danh Muc Cha
                               </option>
                               @foreach($menus as $menu)
                                   <option value="{{$menu->id}}">{{$menu->name}}</option>
                               @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                            <label>Mo Ta</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Mo Ta Chi Tiet</label>
                            <textarea name="content" id="editor" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Kich Hoat</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1"  type="radio" id="active" name="active">
                                <label for="active" class="custom-control-label">Co</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                                <label for="no_active" class="custom-control-label">Khong</label>
                            </div>
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tao Danh Muc</button>
                    </div>
            </div>
            @csrf
        </form>

@endsection

