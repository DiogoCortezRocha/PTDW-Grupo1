@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<head>
    <!-- Outros códigos do cabeçalho -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 20px;
        }

        .card-title {
            color: #333;
        }

        .chart-container {
            height: 70%;
            width: 70%;
            margin: auto;
        }


    </style>
</head>

<div class="row">
    <div class="col-md-6">
        <!-- Card: Docentes que não submeteram restrição -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><strong>Docentes que não submeteram restrição</strong></h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($utilizadores->where('restricaoSubmetida', false) as $utilizador)
                                <tr onclick="window.location='{{ route('pages.detalhesDocente', $utilizador->id) }}';"
                                    style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f5f5f5';"
                                    onmouseout="this.style.backgroundColor='';">

                                    <td>{{ $utilizador->nome }}</td>
                                    <td>{{ $utilizador->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Não existem docentes que não submeteram restrição.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card: Docentes que submeteram restrição -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><strong>Docentes que submeteram restrição</strong></h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($utilizadores->where('restricaoSubmetida', true) as $utilizador)
                                <tr onclick="window.location='{{ route('pages.detalhesDocente', $utilizador->id) }}';"
                                    style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f5f5f5';"
                                    onmouseout="this.style.backgroundColor='';">

                                    <td>{{ $utilizador->nome }}</td>
                                    <td>{{ $utilizador->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Não existem docentes que submeteram restrição.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <!-- Card: Importação e Exportação -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><strong>Importação e Exportação</strong></h2>
            </div>
            <div class="card-body d-flex justify-content-around align-items-center">
                <button type="button" class="btn btn-primary" onclick="window.location='{{ url('importDsd') }}';">Importar</button>
                <button type="button" class="btn btn-primary" onclick="window.location='';">Exportar</button>
            </div>
        </div>

        <!-- Card: Gráfico de Horários Submetidos -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title"><strong>Gráfico de Horários Submetidos</strong></h2>
            </div>
            <div class="card-body">
                <div class="chart-container" style="height:40%; width:40%">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
 </div>
</div>

<script>
    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Com horário submetido', 'Sem horário submetido'],
            datasets: [{
                data: [
                    {{ $utilizadores->where('restricaoSubmetida', true)->count() }},
                    {{ $utilizadores->where('restricaoSubmetida', false)->count() }}
                ],
                backgroundColor: ['rgb(54, 162, 235)', 'rgb(255, 99, 132)'],
            }]
        },
    });
</script>
@endsection
