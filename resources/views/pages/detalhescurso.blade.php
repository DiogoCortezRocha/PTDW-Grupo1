
@extends('layouts.app', ['page' => __('detalhescurso'), 'pageSlug' => 'detalhescurso'])

@section('content')
 
<div class="card-header">
        <h4 class="card-title"><strong>{{ $curso->name }}</strong></h4>


<div class="card-body">
        @include('alerts.success')
        
        
            <div class="col-md-6">
                <div class="form-group">
                    <label><strong>{{ __('Código') }}</strong></label>
                    <p class="card-text">{{ $curso->codigo }}</p>
                </div>

                <div class="form-group">
                    <label><strong>{{ __('Nome do curso') }}</strong></label>
                    <p>{{ $curso->name }}</p>
                </div>
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