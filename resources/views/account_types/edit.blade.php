@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Account Types
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accountTypes, ['route' => ['accountTypes.update', $accountTypes->id], 'method' => 'patch']) !!}

                        @include('account_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection