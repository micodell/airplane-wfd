@extends('layouts.app')
@section('content')

<div class="my-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($flights as $flight)
        <div class="bg-gray-200 rounded-lg px-4 py-3 my-8">
            <div class="flex justify-between">
                <h2 class="font-bold">{{ $flight->flight_code }}</h2>
                <p>{{ $flight->origin }} -> {{ $flight->destination }}</p>
            </div>
            <div>
                <p>Departure</p>
                <p class="font-bold">{{ date('l, d F Y, H:i', strtotime($flight->departure_time)) }}</p>
                <p>Arrived</p>
                <p class="font-bold">{{ date('l, d F Y, H:i', strtotime($flight->arrival_time)) }}</p>
            </div>
            <div class="flex justify-around mt-4">
                <a href="{{ route('tickets.create', $flight->id) }}" class="px-3 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                    <p class="font-semibold text-center">Book Ticket</p>
                </a>
                <a href="{{ route('tickets.show', $flight->id) }}" class="px-3 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                    <p class="font-semibold text-center">View Details</p>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection