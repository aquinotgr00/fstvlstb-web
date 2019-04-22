@extends('index')
@section('content')
    
    <!-- MAIN CONTENT-->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title-1 m-b-25">Transaction List</h2>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu1-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false">Paid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="menu2-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="menu2" aria-selected="false">Batches</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning" id="datatables-resource">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Join Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade active" id="menu1" role="tabpanel" aria-labelledby="menu1-tab">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning" id="datatables-paid">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Amount</th>
                                        <th>Join Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade active" id="menu2" role="tabpanel" aria-labelledby="menu2-tab">
                        <h3>Menu 2</h3>
                        <p>Some content in menu 2.</p>
                    </div>
                </div>

                
            </div>
        </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('script')
    <script>
    $(document).ready( function () {
        $('#datatables-resource').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('admin.transaction.list') !!}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'amount', name: 'amount' },
                { data: 'created_at', name: 'created_at' }
            ]
        });

        $('#datatables-paid').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route('admin.paid-transaction.list') !!}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'amount', name: 'amount' },
                { data: 'created_at', name: 'created_at' }
            ]
        });
    });
</script>

@endsection