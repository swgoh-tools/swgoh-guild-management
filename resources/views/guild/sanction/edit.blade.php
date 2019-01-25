@extends('layouts.app')

@include('layouts.cdn._trix')

@section('content')
<div class="container">
    <h3 class="page-title">@lang('Edit')</h3>

    {!! Form::model($sanction, ['method' => 'PUT', 'route' => ['sanction.update', $guild, $code, $sanction->id]]) !!}

    <div class="card">
        <div class="card-header">
            @lang('Edit') - {{ $sanction->guild->name }} - {{ $sanction->player->code}} aka {{ $sanction->player->name ?? '?'}}
            {!! Form::submit(trans('Update'), ['class' => 'btn btn-xs btn-danger', 'style' => 'float:right;']) !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('origin', 'origin', ['class' => 'control-label']) !!}
                    {!! Form::select('origin', $origins, null, ['class' => 'form-control', 'required' => '', 'placeholder' => '-- ' . __('Choose One') . ' --']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('reason', 'reason', ['class' => 'control-label']) !!}
                    {!! Form::text('reason', null, ['class' => 'form-control', 'required' => '']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('date', 'date', ['class' => 'control-label']) !!}
                    {!! Form::date('date', null, ['class' => 'form-control', 'required' => '']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    {!! Form::label('severity', 'severity', ['class' => 'control-label']) !!}
                    {!! Form::select('severity', $severities, null, ['class' => 'form-control', 'required' => '', 'placeholder' => '-- ' . __('Choose One') . ' --']) !!}
                </div>
                <div class="col-md-4 form-group">
                    {!! Form::label('action', 'action', ['class' => 'control-label']) !!}
                    {!! Form::select('action', $actions, null, ['class' => 'form-control', 'placeholder' => '-- ' . __('Choose One') . ' --']) !!}
                </div>
                <div class="col-md-1 form-group">
                    {!! Form::label('expired', 'expired', ['class' => 'control-label']) !!}
                    {!! Form::checkbox('expired', 1, null, ['class' => 'form-control', 'disabled' => '']) !!}
                </div>
                <div class="col-md-3 form-group">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    {!! Form::label('note', 'note', ['class' => 'control-label']) !!}
                    {!! Form::hidden('note', null, ['class' => 'form-control', 'required' => '']) !!}
                    <trix-editor ref="trix" input="note" placeholder="{{ __('Have something to say?') }}"></trix-editor>
                </div>
            </div>

        </div>
    </div>


    {!! Form::submit(trans('Update'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('sanction', [$guild, $code]) }}" class="btn btn-info">@lang('Back')</a>
    {!! Form::close() !!}
    </div>
@stop
