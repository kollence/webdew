@extends('admin.layout.admin')

@section('content')
   <div class="navbar">
     <p href="#" class="navbar-brand">Categories:</p>
     <ul class="nav navbar-nav">
       @if(!empty($categories))
         @foreach($categories as $cat)
         <li>
           <a href="{{route('category.show',$cat->id)}}">{{$cat->name}}</a>
         </li>
         @endforeach
       @endif
     </ul>

      <a href="#modal-id" class="btn btn-primary" data-toggle="modal">Add Category</a>
      <div class="modal fade" id="modal-id">
        <div class="modal-dialog">

          {!! Form::open(['route'=>'category.store','method'=>'post']) !!}
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                {{Form::label('name','Name') }}
                {{Form::text('name',null,array('class'=>'form-control')) }}
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
              <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
          </div>
          {!! Form::close() !!}

        </div>
      </div>
   </div>
   @if(!empty($products))
   <section>
     <h3>Products</h3>
     <table class="table table-hover">
       <thead>
         <tr>
           <th>Products</th>
         </tr>
       </thead>
       <tbody>
         @forelse($products as $product)
         <tr>
           <td>{{$product->name}}</td>
         </tr>
         @empty
         <tr><td>No data</td></tr>
         @endforelse
       </tbody>
     </table>
   </section>
   @endif
@endsection
