@extends('welcome')
@section('css')
@endsection

@section('content')

<div class="mt-16">
    <h3>City name from pathao api</h3>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8" >
        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="width:900px">
            <div>


                <table class="table table-bordered" style="width:800px">
                    <thead>
                        <tr>
                          <th scope="col">SL</th>
                          <th scope="col">City ID</th>
                          <th scope="col">City name</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $sl=1;
                        @endphp
                        @foreach($cities->data->data as $singledata)
                          <tr>
                            <th scope="row">{{$sl++}}</th>
                            <td>{{$singledata->city_id}}</td>
                            <td>{{$singledata->city_name}}</td>
                            <td><a href="{{route('zone.list',[$singledata->city_id,$singledata->city_name])}}" class="btn btn-danger">view zone</button></td>
                          </tr>
                        @endforeach
                      </tbody>
                </table>

            </div>

        </a>

    </div>
</div>

@endsection

@section('js')
@endsection
