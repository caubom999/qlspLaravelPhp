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

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            @include('admin.alert')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Ten San Pham</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Enter ten San Pham">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh Muc</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}"{{$product->menu_id==$menu->id?'selected':''}}>
                                    {{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Gia Goc</label>
                        <input type="number" name="price" value="{{$product->price}}" class="form-control" placeholder="Enter Gia Goc" step="1">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Gia Giam</label>
                        <input type="number" name="price_sale" value="{{$product->price_sale}}" class="form-control" placeholder="Enter Gia Giam" step="1">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mo Ta</label>
                <textarea name="description"  class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Mo Ta Chi Tiet</label>
                <textarea name="content" id="editor" class="form-control">{{$product->content}}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Products</label>
                <input type="file" class="form-control" id="uploads" >
                <div id="image_show">
                    <a href="" target="_blank">
                        <img src="{{$product->thumb}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}" >
            </div>

            <div class="form-group">
                <label>Kich Hoat</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1"  type="radio" id="active" name="active"
                    {{$product->active==1?'checked=""':''}}>
                    <label for="active" class="custom-control-label">Co</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$product->active==0?'checked=""':''}}>
                    <label for="no_active" class="custom-control-label">Khong</label>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Danh Muc</button>
            </div>
        </div>
        @csrf
    </form>

@endsection

