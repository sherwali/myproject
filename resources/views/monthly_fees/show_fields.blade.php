<!-- Batches Id Field -->
<div class="form-group">
    {!! Form::label('batches_id', 'Grade:') !!}
    <p>{{ $monthlyFee->batch->grade->name }}</p>
</div>
<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $monthlyFee->amount }}</p>
</div>


