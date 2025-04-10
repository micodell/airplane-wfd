<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>
@extends('layouts.app')
@section('content')

<div class="my-4">
    @if (session('success'))
        <div class="w-full px-6 py-3 mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-around">
        <h1 class="text-3xl font-bold">Ticket Details for {{ $flight->flight_code }}</h1>
        <div class="flex justify-between gap-4">
            <h1 class="text-3xl font-bold">{{ $tickets->count() }} passangers</h1>
            <h1 class="text-3xl font-bold">|</h1>
            <h1 class="text-3xl font-bold">{{ $tickets->where('is_boarding',1)->count() }} boardings</h1>
        </div>
    </div>
    <hr>
    <div class="flex justify-around">
        <p>{{ $flight->origin }} => {{ $flight->destination }}</p>
        <div class="flex justify-around gap-3">
            <p>Departure</p>
            <i class="font-bold">{{ date('l, d F Y, H:i', strtotime($flight->boarding_time)) }}</i>
        </div>
        <div class="flex justify-around gap-3">
            <p>Arrival</p>
            <i class="font-bold">{{ date('l, d F Y, H:i', strtotime($flight->arrival_time)) }}</i>
        </div>
    </div>

    <h1 class="text-3xl font-bold mt-8 mb-4">Passangers list</h1>
    <div class="flex flex-col items-center">
        <table class="w-3/4 max-w-[90rem] text-base text-left rtl:text-right">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Passanger Name</th>
                    <th>Passanger Phone</th>
                    <th>Seat Number</th>
                    <th>Boarding</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td class="py-1">{{ $tickets->firstItem() + $loop->index }}</td>
                        <td class="py-1">{{ $ticket->passanger_name }}</td>
                        <td class="py-1">{{ $ticket->passanger_phone }}</td>
                        <td class="py-1">{{ $ticket->seat_number }}</td>
                        <td class="py-1">
                            @if ($ticket->is_boarding == 0)
                                <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-gray-300 rounded-lg px-3">Confirm</button>
                                </form>
                            @else
                                {{ date('d-m-Y, H:i', strtotime($ticket->boarding_time)) }}
                            @endif
                        </td>
                        <td class="py-1">
                            @if ($ticket->is_boarding == 0)
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-gray-200 font-bold rounded-lg px-3">Delete</button>
                                </form>
                            @else
                                <button type="hidden" class="bg-gray-200 text-gray-500 rounded-lg px-3">Delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{ route('flights.index') }}" class="px-8 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg">
            <p class="font-semibold text-center">Back</p>
        </a>
    </div>
</div>

@endsection