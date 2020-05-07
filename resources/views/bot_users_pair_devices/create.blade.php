@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bot Users Pair Devices
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'botUsersPairDevices.store']) !!}

                        @include('bot_users_pair_devices.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
