@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Events</h3>
                            <div class="text-end mb-3">
                                <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary">Create</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($events)
                                        @foreach($events as $event)
                                            <tr>
                                                <td>{{ $event->id }}</td>
                                                <td><img src="{{ $event->image_url }}" class="img-fluid" alt="" width="100"></td>
                                                <td>{{ $event->name }}</td>
                                                <td>{{ $event->description }}</td>
                                                <td>{{ $event->type->name }}</td>
                                                <td>
                                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-primary">View</a>
                                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="5">No events found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 my-3">
                                {{ $events->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
