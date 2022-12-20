@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
            <div class="card">
                <div class="card-header fw-bold">
                    {{ __('Student Name: '. $student->name) }}
                    <a class="link-secondary float-end" href="{{ route('student', $id) }}">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('student.grade.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="hidden" name="semester" value="{{ $semester }}">


                        <div class="row mb-3">
                            <label for="grade" class="col-md-4 col-form-label text-md-end">
                                @switch($semester)
                                    @case('1')
                                        {{ __('1st Semester Grade: ') }}
                                        @break
                                    @case('2')
                                        {{ __('2nd Semester Grade: ') }}
                                        @break
                                    @case('3')
                                        {{ __('3rd Semester Grade: ') }}
                                        @break
                                    @case('4')
                                        {{ __('4th Semester Grade: ') }}
                                    @default

                                @endswitch
                            </label>

                            <div class="col-md-6">
                                <input id="grade" type="number" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') }}" required autocomplete="grade" autofocus>
                                <small>Grade must be from 0 - 100</small>
                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- save --}}

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection
