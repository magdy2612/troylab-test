@extends('layouts.admin')

@section('page_title')
    <h1 class="text-center" style="margin-bottom: 1.5rem;">Schools</h1>
@stop

@section('pageContent')
<a style="float: right;" href="{{ route('schools.create') }}" class="btn btn-primary" title="Create New School"><i class="fa fa-plus icon-plus"></i></a>
    
<table class="table table-striped-X table-hover table-sm-X table-bordered-X table-responsive resources-table" style="margin-bottom: 0;" id="schools">
    <thead class="thead-default-X">
        <tr>
            <th>ID</th>
            <th>
                Name
            </th>
            <th class="text-center pr-0">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($resources as $item)
        <tr>
            <td class="text-center pr-0">
                <a href="{{ route('schools.edit', $item->id) }}">
                    {{ $item->id }}
                </a>
            </td>
            <td>
                <a href="{{ route('schools.edit', $item->id ) }}">
                    {{ $item->name }}
                </a>
            </td>

            <td class="text-right" style="width: 172px;">                
                <a href="{{ route('schools.edit', $item->id ) }}" class="btn" title="View & Edit"><i class="fa fa-edit"></i></a>
                <a class="dropdown-item" href="{{ route('schools.destroy', $item->id ) }}"
                   onclick="event.preventDefault();document.getElementById('delete-form-{{$item->id}}').submit();">
                    <i class="fa fa-trash"></i>
                </a>

                <form id="delete-form-{{$item->id}}" action="{{ route('schools.destroy', $item->id ) }}" method="POST" class="d-none">
                    @csrf
                    {{ method_field('DELETE') }}
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready( function () {
        $('#schools').DataTable();
    } );
</script>
@stop
