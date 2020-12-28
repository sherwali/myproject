@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Monthly Fee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($monthlyFee, ['route' => ['monthlyFees.update', $monthlyFee->id], 'method' => 'patch']) !!}

                        @include('monthly_fees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection