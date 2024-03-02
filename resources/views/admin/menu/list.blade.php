@extends('admin.main')

@section('contents')

   <table>
       <thead>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Active</th>
               <th></th>
               <th>&nbsp;UpDate</th>
               <th>&nbsp;Delete</th>
           </tr>
       </thead>
       <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
       </tbody>
   </table>
@endsection
