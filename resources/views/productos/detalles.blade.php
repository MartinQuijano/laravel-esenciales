@extends('productos.sidebar')
@section('content_area')

<div class="content">
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                @if($informacion['totalWeight'] > 0)
                <div class="card">
                    <div class="card-header text-center">
                        INFORMACIÓN NUTRICIONAL PORCIÓN 
                        <div> {{ number_format((float)$informacion['totalWeight'], 4, '.','') }}g </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Valor energético {{ number_format((float)$informacion['totalNutrients']['ENERC_KCAL']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['ENERC_KCAL']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Carbohidratos {{ number_format((float)$informacion['totalNutrients']['CHOCDF']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['CHOCDF']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Proteinas {{ number_format((float)$informacion['totalNutrients']['PROCNT']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['PROCNT']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Grasas totales {{ number_format((float)$informacion['totalNutrients']['FAT']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['FAT']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Grasas saturadas {{ number_format((float)$informacion['totalNutrients']['FASAT']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['FASAT']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Fibra {{ number_format((float)$informacion['totalNutrients']['FIBTG']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['FIBTG']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Sodio {{ number_format((float)$informacion['totalNutrients']['NA']['quantity'], 4, '.','') }} {{ $informacion['totalNutrients']['NA']['unit'] }}
                        </li>
                    </ul>
                </div> 
                @else
                <div class="card">
                    <div class="card-header text-center">
                        No hay información adicional sobre este producto
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection