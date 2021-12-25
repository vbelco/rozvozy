@extends('welcome')
@section('content')

    <h1> Status: {{ $rozvoz->orders_status_id }}   {{ $rozvoz->orders_status_name }} </h1>

    <table class="table">
    @foreach ($objednavky as $ob)
        <tr>                                    
           <td>{{ $ob->orders_id }}</td>
           <td> {{ $ob->customers_name }} <br> {{ $ob->customers_street_address }} <br> {{ $ob->customers_city }}  </td>
           <td>
               <table>
                   @foreach ($produkty[$ob->orders_id] as $p)
                       <tr>
                           <td>{{ $p->products_id }}</td>
                           <td> {{ $p->description->products_name }}  </td>
                           <td>
                           <table class="table">
                           @foreach( $p->baliky as $b )
                                <tr>
                                    <td>{{  $b->nazov }}</td>
                                </tr>
                           @endforeach
                                <tr>Pridaj</tr>
                           </table>
                           </td>
                       </tr>
                   @endforeach
               </table>
           </td>
        </tr>
    @endforeach
    </table>


@endsection('content')
