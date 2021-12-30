@extends('welcome')
@section('content')

    <table width="90%"><tr>
        <td>
            <h1> Status: {{ $rozvoz->orders_status_id }}   {{ $rozvoz->orders_status_name }} </h1>
        </td>
        <td align="right">
            {!! QrCode::generate('localhost/10'); !!}
        </td>
        
    </tr></table>
    
    
    <table class='table'>
    @foreach($objednavky as $o)
            @foreach ($o->products as $p)
                @if ( $p->baliky->count() == 0 )
                        <tr style='border-bottom:1px solid #5B2C6F;'>
                        <td></td>    
                        <td> {{ $o->customers_name }} ,{{  $o->customers_city }}</td>
                        <td>{{ $p->description->products_name }}</td>
                        <td> Produkt nema baliky! </td>
                        <td><a class='btn btn-primary' > Pridaj </a> </td>
                    </tr>
                
                @else
                    @foreach ( $p->baliky as $b )
                            <tr>
                            <td>
                                @if ($b->viazana) {{-- ak je nazov balika viazany na objednavku --}}
                                  {{ $o->orders_id }}   
                                @endif 
                            </td>
                            <td>
                                @if ($b->viazana) {{-- ak je nazov balika viazany na objednavku --}} 
                                    {{ $o->customers_name }} ,{{  $o->customers_city }}
                                @endif
                            </td>
                            <td>
                                @if ($b->viazana) {{-- ak je nazov balika viazany na objednavku --}}  
                                    {{ $p->description->products_name }}
                                @endif
                            </td>
                            <td>{{  $b->nazov }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    {{-- este si pridame dalsi riadok na ponuku pridania riadku --}}
                    <tr style='border-bottom:1px solid #5B2C6F;'> 
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <td></td>  
                        <td><a class='btn btn-primary' > Pridaj </a></td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        </table>

@endsection('content')
