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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            <h3 class="title-2">recent reports</h3>
                                            <div class="chart-info">
                                                <div class="chart-info__left">
                                                    <div class="chart-note">
                                                        <span class="dot dot--blue"></span>
                                                        <span>products</span>
                                                    </div>
                                                    <div class="chart-note mr-0">
                                                        <span class="dot dot--green"></span>
                                                        <span>services</span>
                                                    </div>
                                                </div>
                                                <div class="chart-info__right">
                                                    <div class="chart-statis">
                                                        <span class="index incre">
                                                            <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                                        <span class="label">products</span>
                                                    </div>
                                                    <div class="chart-statis mr-0">
                                                        <span class="index decre">
                                                            <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                                        <span class="label">services</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="recent-report__chart">
                                                <canvas id="recent-rep-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="au-card chart-percent-card">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 tm-b-5">char by %</h3>
                                            <div class="row no-gutters">
                                                <div class="col-xl-6">
                                                    <div class="chart-note-wrap">
                                                        <div class="chart-note mr-0 d-block">
                                                            <span class="dot dot--blue"></span>
                                                            <span>products</span>
                                                        </div>
                                                        <div class="chart-note mr-0 d-block">
                                                            <span class="dot dot--red"></span>
                                                            <span>services</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="percent-chart">
                                                        <canvas id="percent-chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                <!-- END MAIN CONTENT-->
    @endsection
