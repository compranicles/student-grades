@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (auth()->user()->role == '1')
            @php
                $j = 4;
            @endphp
            @for ($i = 0; $i < 4; $i++)
                <div class="col-md-8 mb-4">
                    <div class="card">
                        @switch($j)
                            @case('4')
                                <div class="card-header fw-bold">{{ __('4th Semester') }}</div>
                                @break
                            @case('3')
                                <div class="card-header fw-bold">{{ __('3rd Semester') }}</div>
                                @break
                            @case('2')
                                <div class="card-header fw-bold">{{ __('2nd Semester') }}</div>
                                @break
                            @case('1')
                                <div class="card-header fw-bold">{{ __('1st Semester') }}</div>
                                @break
                            @default
                        @endswitch

                        <div class="card-body">
                            {{-- create a table of subjects --}}
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($grades[$i] as $row)
                                            <tr class="text-center">
                                                <td>{{ $row['subject_name'] }}</td>
                                                <td>{{ $row['teacher_name'] }}</td>
                                                <td>{{ $row['grade'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $j--;
                @endphp
            @endfor
        @else
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold">{{ __('Subject Name: '. $subject->name) }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2">Student</th>
                                        <th colspan="4">Semester</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>1st</th>
                                        <th>2nd</th>
                                        <th>3rd</th>
                                        <th>4th</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $row)
                                        <tr class="text-center">
                                            <td>{{ $row['name'] }}</td>
                                            @for($i = 1; $i <= 4; $i++)
                                                <td>{{ $row['grade'][$i] }}</td>
                                            @endfor
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('student', $row['id']) }}">
                                                    {{ __('Manage') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
