@extends('layouts.app', ['page' => __('inserir_uc'), 'pageSlug' => 'unidadesCurriculares'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <form method="POST" action="{{ route('inserir_uc.store') }}">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('codigo') ? ' has-danger' : '' }}">
                                <label>{{ __('Código da unidade curricular') }}</label>
                                <input type="text" name="codigo"
                                    class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('Código') }}">
                                @include('alerts.feedback', ['field' => 'codigo'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome da unidade curricular') }}</label>
                                <input type="text" name="name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('acn') ? ' has-danger' : '' }}">
                                <label>{{ __('ACN') }}</label>
                                <input type="text" name="acn"
                                    class="form-control{{ $errors->has('acn') ? ' is-invalid' : '' }}"
                                    placeholder="{{ __('ACN') }}">
                                @include('alerts.feedback', ['field' => 'acn'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('horas') ? ' has-danger' : '' }}">
                                <label>{{ __('Número de horas semanais da unidade curricular') }}</label>
                                <input type="text" name="horas"
                                    class="form-control{{ $errors->has('horas') ? ' is-invalid' : '' }}" placeholder="{{ __('Horas') }}">
                                @include('alerts.feedback', ['field' => 'horas'])
                            </div>
                        </div>
                       
                    </div>

                </div>
                    <div class="card-footer">
                        <div class="text-right"> <!-- Alinhamento à direita -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
            </form>

         </div>
    </div>
   
</div>
@if (session('success'))
<div id="success-message" class="alert alert-success">
    {{ session('success') }}
</div>
<script>
    setTimeout(function() {
        const element = document.getElementById('success-message');
        element.style.display = 'none';
    }, 5000);
</script>
@endif
@if(Session::has('error'))
    <div id="error-message" class="alert alert-warning">
        {{ Session::get('error') }}
    </div>
    <script>
        setTimeout(function() {
            const element = document.getElementById('error-message');
            element.style.display = 'none';
             }, 5000);
    </script>
@endif
@endsection