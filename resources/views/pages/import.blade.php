<div>
    
</div>

@extends('layouts.app', ['page' => __('docentes'), 'pageSlug' => 'docentes'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h2 class="card-title"><strong>Importar Docentes</strong></h2>
                        </div>
                        
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-8" >
                        @if (isset($errors) && $errors->any())
                            <div class="alert alert-warning" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <div class="custom-file text-left">
                                    {{-- <input type="file" name="file" class="custom-file-input" id="customFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"> --}}
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Selecione o ficheiro</label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Importar dados</button>
                                {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
