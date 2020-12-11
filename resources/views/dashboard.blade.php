@extends('layouts.app')

@push('stylesheets')

@endpush

@section('content')
    <main>
        <div class="container my-5">
           <div class="card-body text-center">
                <h4 class="card-title">Entry List</h4>
            </div>
            <div class="card">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">Full Name</th>
                            <th class="text-left">Phone Number</th>
                            <th class="text-center">Temperature</th>
                            <th class="text-left">Check In Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entries as $entry)
                        <tr>
                            <td class="text-left">{{ $entry->full_name }}</td>
                            <td class="text-left">{{ $entry->phone_number }}</td>
                            <td class="text-center">
                                @if($entry->temperature >= 37.5)
                                    <h5><span class="badge badge-danger">{{ $entry->temperature }}</span></h5>
                                @else
                                    <h5><span class="badge badge-success">{{ $entry->temperature }}</span></h5>
                                @endif()
                            </td>
                            <td class="text-left">{{ $entry->checkin_date->setTimezone("Asia/Singapore")->toDayDateTimeString() }}</td>
                        </tr>
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

@endpush

