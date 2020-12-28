@extends('layouts.app')

@section('content')

@foreach ($allsessions as $allsession)

<a href="/allstudents/{{$allsession->id}}">{{  $allsession->name }}-</a>

@endforeach
<hr>
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
@endsection
