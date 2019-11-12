@extends('rbarcos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all Rbarcos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rbarcos.create') }}"> Create new blogs</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($rbarcos as $rbarco)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rbarco->title }}</td>
            <td>{{ $rbarco->description }}</td>
            <td>
                <form action="{{ route('rbarcos.destroy',$rbarco->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('rbarcos.show',$rbarco->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('rbarcos.edit',$rbarco->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $rbarcos->links() !!}
      
@endsection