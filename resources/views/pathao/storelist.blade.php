@extends('welcome')
@section('css')
@endsection

@section('content')

<div class="mt-16">
    <h3>Store list from pathao api</h3>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8" >
        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="width:900px">
            <div>


                <table class="table table-bordered" style="width:800px">
                    <thead>
                        <tr>
                          <th scope="col">SL</th>
                          <th scope="col">Store ID</th>
                          <th scope="col">Store name</th>
                          <th scope="col">Address</th>
                          <th scope="col">Active</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $sl=1;
                        @endphp
                        @foreach($stores->data->data as $singledata)
                          <tr>
                            <th scope="row">{{$sl++}}</th>
                            <td>{{$singledata->store_id}}</td>
                            <td>{{$singledata->store_name}}</td>
                            <td>{{$singledata->store_address}}</td>
                            <td>{{$singledata->is_active==1?("Active"):("Inactive")}}</td>
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
