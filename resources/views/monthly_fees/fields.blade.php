<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Batches Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('batches_id', 'Batches Id:') !!}
    {!! Form::number('batches_id', null, ['class' => 'form-control']) !!}
</div> --}}

<div class="form-group col-sm-6">
    {!! Form::label('grade', 'Grade:') !!}
    <select name="batches_id" id="grade" class='form-control'>
        @foreach ($batches as $batch)

        <option value="{{ $batch->id }}">{{$batch->grade->name}}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('monthlyFees.index') }}" class="btn btn-default">Cancel</a>
</div>
