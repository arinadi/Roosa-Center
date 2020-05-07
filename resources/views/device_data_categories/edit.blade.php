@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Device Data Categories
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deviceDataCategories, ['route' => ['deviceDataCategories.update', $deviceDataCategories->id], 'method' => 'patch']) !!}

                        @include('device_data_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection