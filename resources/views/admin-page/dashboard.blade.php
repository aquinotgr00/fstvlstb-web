    @extends('index')
    @section('active-dashboard')
    active
    @endsection
     @section('content')
     <!-- MAIN CONTENT-->
                            <div class="row">
                                <div class="col-lg-7">
                                    <h2 class="title-1 m-b-25">Stream & Download <a href="#" class="pull-right">=</a></h2>

                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>Tracklist</th>
                                                    <th >Stream</th>
                                                    <th >Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tracklist as $i=>$row)
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td class="text-right">{{ $row->counter }}</td>
                                                    <td class="text-right">{{ $row->download }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <h2 class="title-1 m-b-25">Product Selling</h2>
                                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                        <div class="au-card-inner">
                                            <div class="table-responsive">
                                                <table class="table table-top-countries">
                                                    <tbody>
                                                        @foreach($order as$i=>$row)
                                                        <tr>
                                                            <td>{{ $row->product }}</td>
                                                            <td class="text-right">{{ $row->quantity }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                <!-- END MAIN CONTENT-->
    @endsection
