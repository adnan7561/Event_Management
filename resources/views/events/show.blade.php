@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View Event') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">

                                    <div class="text-end mb-3">
                                        <a href="{{ route('home') }}" class="btn btn-sm btn-primary">Back</a>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ $event->image_url }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>{{ $event->name }}</h3>
                                            <p>{{ $event->description }}</p>
                                            <p><strong>Type:</strong> {{ $event->type->name }}</p>
                                            <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($event->created_at)->format('d/m/Y H:i:s') }}</p>
                                            <p><strong>Updated At:</strong> {{ \Carbon\Carbon::parse($event->updated_at)->format('d/m/Y H:i:s') }}</p>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
