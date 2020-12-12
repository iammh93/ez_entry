@extends('layouts.app')

@push('stylesheets')

@endpush

@section('content')
    <main>
        <div class="container my-5">
            <div class="card-body text-left">
                <h4 class="card-title">{{ __("dashboard.header.entry_list") }}</h4>
                <div class="row">
                    <div class="col-md-6">
                        @foreach($filter_by as $filter)
                            <ul class="list-group">
                                <li class="list-group-item">{{ $filter }}</li>
                            </ul>
                        @endforeach()
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-left">{{ __("dashboard.entry_form.step_1.full_name.label") }}</th>
                                    <th class="text-left">{{ __("dashboard.entry_form.step_1.phone_number.label") }}</th>
                                    <th class="text-center">
                                        <a href="{{ request()->fullUrlWithQuery(['temperature' => request()->input("temperature") === 'asc' ? 'desc' : 'asc']) }}">{{ __("dashboard.entry_form.step_1.temperature.label") }}
                                        </a>
                                    </th>
                                    <th class="text-left">
                                        <a href="{{ request()->fullUrlWithQuery(['checkin_date' => request()->input("checkin_date") === 'asc' ? 'desc' : 'asc']) }}">{{ __("dashboard.entry_form.step_1.checkin_time.label") }}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($valid_entries as $entry)
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
                                @if($valid_entries->count() === 0)
                                    <tr>
                                        <td>{{ __("general.record_not_found") }}</td>
                                    </tr>
                                @endif()
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-left">{{ __("dashboard.entry_form.step_1.full_name.label") }}</th>
                                    <th class="text-left">{{ __("dashboard.entry_form.step_1.phone_number.label") }}</th>
                                    <th class="text-center">
                                        <a href="{{ request()->fullUrlWithQuery(['temperature' => request()->input("temperature") === 'asc' ? 'desc' : 'asc']) }}">{{ __("dashboard.entry_form.step_1.temperature.label") }}
                                        </a>
                                    </th>
                                    <th class="text-left">
                                        <a href="{{ request()->fullUrlWithQuery(['checkin_date' => request()->input("checkin_date") === 'asc' ? 'desc' : 'asc']) }}">{{ __("dashboard.entry_form.step_1.checkin_time.label") }}</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invalid_entries as $entry)
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
                                @if($invalid_entries->count() === 0)
                                    <tr>
                                        <td>{{ __("general.record_not_found") }}</td>
                                    </tr>
                                @endif()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

@endpush

