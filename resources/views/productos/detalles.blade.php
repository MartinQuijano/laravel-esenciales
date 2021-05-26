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
                        <div> {{ $informacion['totalWeight'] }}g </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Valor energético {{ $informacion['totalNutrients']['ENERC_KCAL']['quantity'] }} {{ $informacion['totalNutrients']['ENERC_KCAL']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Carbohidratos {{ $informacion['totalNutrients']['CHOCDF']['quantity'] }} {{ $informacion['totalNutrients']['CHOCDF']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Proteinas {{ $informacion['totalNutrients']['PROCNT']['quantity'] }} {{ $informacion['totalNutrients']['PROCNT']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Grasas totales {{ $informacion['totalNutrients']['FAT']['quantity'] }} {{ $informacion['totalNutrients']['FAT']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Grasas saturadas {{ $informacion['totalNutrients']['FASAT']['quantity'] }} {{ $informacion['totalNutrients']['FASAT']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Fibra {{ $informacion['totalNutrients']['FIBTG']['quantity'] }} {{ $informacion['totalNutrients']['FIBTG']['unit'] }}
                        </li>
                        <li class="list-group-item">
                            Sodio {{ $informacion['totalNutrients']['NA']['quantity'] }} {{ $informacion['totalNutrients']['NA']['unit'] }}
                        </li>
                    </ul>
                </div> 
                @endif
            </div>
        </div>
    </div>
</div>
@endsection