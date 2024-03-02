@extends('admin.main')

@section('contents')

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Anh SP</th>
            <th>Ten SP</th>
            <th>Danh Muc</th>
            <th>Gia</th>
            <th>Gia Giam</th>
            <th>Active</th>
            <th></th>
            <th>&nbsp;UpDate</th>
            <th>&nbsp;Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $key =>$product)
            <tr>
            <td>{{$product-> id}}</td>
             <td><img src="{{$product->thumb}}" width="100px"></td>
            <td>{{$product-> name }}</td>
{{--                <td>{{$product->menu->name}}</td>--}}
                <td>{{$product->menu?$product->menu->name:'-'}}</td>
{{--            <td>{{$product->menu->name}}</td><td> {{$product->menu?$product->menu->name:'-'}} </td>--}}
            <td>{{$product-> price}}</td>
            <td>{{$product-> price_sale}}</td>
            <td>{!!\App\Helpers\Helper::active($product->active)!!}</td>
            <td>{{$product-> update_at}}</td>

            <td>
                <a class="btn btn-success btn-sm" href="/admin/products/edit/{{$product-> id}}">
                    <i class="fas fa-edit"></i>
                </a>
            </td>

            <td> <a class="btn btn-danger btn-sm" href="#" onclick="removeRow({{$product-> id}},'/admin/products/destroy')">
                    <i class="fas fa-trash"></i></a>
            </td>

        </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products -> links() !!}
@endsection
