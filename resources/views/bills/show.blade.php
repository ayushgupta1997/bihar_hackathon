@extends('layouts.app')
@section('content')
  <div class="row">
    <h1>Bill No. - {{$bill->id}}</h1>
    </a>
    <div class="col-xs-6">
      {{$bill->description}}
    </div>
    <div class="col-xs-6">
      <img src="{{URL::asset('/images/'.$bill->scanned_copy_path)}}">
    </div>
  </div>
  <div class="row">
    Bill is
    @if($bill->verified==1)
      verified
      @else
      unverified
      @endif
  </div>
  @if(Auth::user()->hasRole('Payer'))
      @if($bill->verified==0)
            {!! Form::open(['method'=>'GET','action'=>['BillController@verify',$bill->id]]) !!}
            <div class="form-group">
              {!!Form::submit('Verify Bill',['class'=>'btn btn-primary','rows'=>3])!!}
            </div>
            {!! Form::close() !!}
      @else
            @if($bill->paid==0)
                    {!! Form::open(['method'=>'GET','action'=>['InvoiceController@create',$bill->id]]) !!}
                    <div class="form-group">
                      {!!Form::submit('Pay for Bill',['class'=>'btn btn-primary','rows'=>3])!!}
                    </div>
                    {!! Form::close() !!}
            @else
                    {!! Form::open(['method'=>'GET','action'=>['InvoiceController@show',$bill->id]]) !!}
                    <div class="form-group">
                      {!!Form::submit('Show Invoice',['class'=>'btn btn-primary','rows'=>3])!!}
                    </div>
                    {!! Form::close() !!}
            @endif
      @endif
  @endif
  @if(Auth::user()->id == $bill->user_id)
    {!! Form::open(['method'=>'GET','action'=>['BillController@edit',$bill->id]]) !!}
    <div class="form-group">
      {!!Form::submit('Edit Bill',['class'=>'btn btn-primary','rows'=>3])!!}
    </div>
  {!! Form::close() !!}
  @endif
@endsection