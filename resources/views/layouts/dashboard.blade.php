    @extends('index')
    @section('active-dashboard')
    active
    @endsection
     @section('content')
     <!-- MAIN CONTENT-->
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="title-1 m-b-25">List order <a href="#" class="pull-right">=</a></h2>

                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>order ID</th>
                                                    <th>product</th>
                                                    <th class="text-right">status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>100398</td>
                                                    <td>iPhone X 64Gb Grey</td>
                                                    <td class="text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td>100397</td>
                                                    <td>Samsung S8 Black</td>
                                                    <td class="text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td>100396</td>
                                                    <td>Game Console Controller</td>
                                                    <td class="text-right">2</td>
                                                </tr>
                                                <tr>
                                                    <td>100395</td>
                                                    <td>iPhone X 256Gb Black</td>
                                                    <td class="text-right">1</td>
                                                <tr>
                                                    <td>100393</td>
                                                    <td>USB 3.0 Cable</td>
                                                    <td class="text-right">3</td>
                                                </tr>
                                                <tr>
                                                    <td>100392</td>
                                                    <td>Smartwatch 4.0 LTE Wifi</td>
                                                    <td class="text-right">6</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h2 class="title-1 m-b-25">Best Seller</h2>
                                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                        <div class="au-card-inner">
                                            <div class="table-responsive">
                                                <table class="table table-top-countries">
                                                    <tbody>
                                                        <tr>
                                                            <td>United States</td>
                                                            <td class="text-right">$119,366.96</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Australia</td>
                                                            <td class="text-right">$70,261.65</td>
                                                        </tr>
                                                        <tr>
                                                            <td>United Kingdom</td>
                                                            <td class="text-right">$46,399.22</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Turkey</td>
                                                            <td class="text-right">$35,364.90</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Germany</td>
                                                            <td class="text-right">$20,366.96</td>
                                                        </tr>
                                                        <tr>
                                                            <td>France</td>
                                                            <td class="text-right">$10,366.96</td>
                                                        </tr>
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
