@extends('layouts.app')

@section('content')


<ul>
    @foreach ($batches as $batch)
        <li>{{$batch->grade->name}}</li>
    @endforeach
</ul>

{{-- <ul>
    @foreach ($batches as $batch)
        <li>
            <ul>
                @foreach ($batch->students as $student)
                <li>{{$student->name}}
                </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul> --}}




@endsection
