@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold">
                    {{ __('Student Name: '. $student->name) }}
                    <a class="link-secondary float-end" href="{{ route('home') }}">Back</a>
                </div>

                <div class="card-body">
                    {{-- receive session success--}}
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <tbody>
                                @for ($i=1; $i<=4; $i++)
                                    <tr>
                                        <th class="text-start">
                                            @switch($i)
                                                @case('1')
                                                    {{ __('1st Semester') }}
                                                    @break
                                                @case('2')
                                                    {{ __('2nd Semester') }}
                                                    @break
                                                @case('3')
                                                    {{ __('3rd Semester') }}
                                                    @break
                                                @case('4')
                                                    {{ __('4th Semester') }}
                                                @default
                                            @endswitch
                                        </th>
                                        <td class="text-center">{{ $grades[$i] }}</td>
                                        <td class="text-end">
                                            @if($grades[$i] == '-')
                                                <a class="btn btn-sm btn-success" href="{{ route('student.grade.add', [$student->id, $i]) }}">Add</a>
                                            @else
                                                <a class='btn btn-sm btn-primary' href="{{ route('student.grade.edit', [$student->id, $i]) }}">Update</a>
                                                <a class='btn btn-sm btn-danger' href="{{ route('student.grade.delete', [$student->id, $i]) }}">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection
