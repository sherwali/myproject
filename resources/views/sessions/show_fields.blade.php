<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $session->name }}</p>
    <ul>
        @foreach ($session->grades as $grade)
            <li>{{$grade->name}}</li>
        @endforeach
    </ul>
</div>

