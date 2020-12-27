@extends('layouts.app')

@section('content')


<ul>
    @foreach ($batches as $batch)
        <li><a href="{{ route('allstudents.grades',[$batch->id])  }}">{{$batch->grade->name}}</a>
            <ul>
                @foreach ($batch->students as $student)
                <li>
                    {{$student->name}}
                </li>
                @endforeach

            </ul>
        </li>
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
