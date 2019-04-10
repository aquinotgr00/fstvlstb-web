    @extends('index')
    @section('content')
     <!-- MAIN CONTENT-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="title-1 m-b-25">List Registered Member </h2>

                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning" id="datatables-member">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Join Date</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                <!-- END MAIN CONTENT-->
    @endsection
    @section('script')
     <script>
       $(document).ready( function () {
        $('#datatables-member').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{!! route('admin.member.list') !!}",
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'created_at', name: 'created_at' }
                     ]
            });
         });
    </script>

    @endsection