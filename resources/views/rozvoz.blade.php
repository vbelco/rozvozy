@extends('welcome')


@section('content')

    <h1> Status: {{ $rozvoz->orders_status_id }}   {{ $rozvoz->orders_status_name }} </h1>

    <table>
    @foreach ($objednavky as $ob)
        <tr>
           <td>{{ $ob->orders_id }}</td>
           <td> {{ $ob->customers_name }} </td>
           <td>
               <table>
                   @foreach ($produkty[$ob->orders_id] as $p)
                       <tr>
                           <td>{{ $p->products_id }}</td>
                           <td> {{ $p->description->products_name }}  </td>
                       </tr>
                   @endforeach
               </table>
           </td>
        </tr>
    @endforeach
    </table>


@endsection('content')
