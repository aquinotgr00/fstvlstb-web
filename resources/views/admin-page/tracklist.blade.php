    @extends('index')
    @section('content')
     <!-- MAIN CONTENT-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="title-1 m-b-25">Tracklist </h2>

                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning" id="datatables-tracklist">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Content</th>
                                                    <th>Status</th>
                                                    <th>Release Date</th>
                                                    <th>Counter</th>
                                                    <th>Action</th>
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
        $('#datatables-tracklist').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{!! route('admin.tracklist.list') !!}",
               columns: [
                        { data: 'name', name: 'name' },
                        { data: 'content', name: 'content' },
                        { data: 'status', name: 'status' },
                        { data: 'release_date', name: 'release_date' },
                        { data: 'counter',name:'counter'},
                         { data: 'action', name: 'action' }
                     ]
            });
         });
    </script>

    @endsection