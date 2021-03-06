@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bot Users Pair Devices
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('bot_users_pair_devices.show_fields')
                    <a href="{{ route('botUsersPairDevices.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
