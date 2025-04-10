<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
@extends('layouts.app')
@section('content')

    <div class="my-4 mx-4">
        <div class="flex justify-around">
            <h1 class="text-3xl font-bold">Ticket Booking for</h1>
            <h1 class="text-3xl font-bold">{{ $flight->flight_code }}</h1>
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

        <form action="{{  route('tickets.store') }}" method="POST">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">
            <div class="flex flex-col w-[40rem] my-8">
                <div class="flex mb-5">
                    <label for="passanger_name" class="block mb-2 text-base font-medium text-gray-900 w-48">Passanger Name</label>
                    <input type="text" name="passanger_name" id="passanger_name" class="shadow-xs bg-gray-200 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                </div>
                <div class="flex mb-5">
                    <label for="passanger_phone" class="block mb-2 text-base font-medium text-gray-900 w-48">Passanger Phone</label>
                    <input type="text" name="passanger_phone" id="passanger_phone" class="shadow-xs bg-gray-200 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                </div>
                <div class="flex mb-5">
                    <label for="seat_number" class="block mb-2 text-base font-medium text-gray-900 w-48">Seat Number</label>
                    <input type="text" name="seat_number" id="seat_number" class="shadow-xs bg-gray-200 text-gray-900 text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                </div>
            </div>
            <div class="flex justify-end gap-4 mt-4">
                <a href="{{ route('flights.index') }}" class="px-8 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg">
                    <p class="font-semibold text-center">Cancel</p>
                </a>
                <button type="submit" class="text-white bg-gray-600 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-base px-5 py-2.5 text-center">Book Ticket</button>
            </div>
        </form>

    </div>

@endsection