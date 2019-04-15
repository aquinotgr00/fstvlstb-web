    @extends('index')
    @section('active-dashboard')
    active
    @endsection
     @section('content')
     <!-- MAIN CONTENT-->

            <div class="row">
                                    <div class="col-lg-4">
                                            <div class="au-card chart-percent-card">
                                                <div class="au-card-inner">
                                                    <h4 class="title-2 tm-b-3">Audio
                                                        @if(!empty($tracklist->content))
                                                        <i class="fa fa-check-circle pull-right" aria-hidden="true"></i>
                                                        @endif
                                                    </h4>
                                                    <div class="row no-gutters">
                                                        <div class="col-xl-12">
                                                            <form method="POST" action="{{ route('admin.tracklist.upload.stream',['id'=>$tracklist->id]) }}" enctype="multipart/form-data" >
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <input id="name" type="file" class="form-control" name="audio" value="" required autofocus>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-4">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            SUBMIT
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="au-card chart-percent-card">
                                                <div class="au-card-inner">
                                                    <h4 class="title-2 tm-b-5">Preview
                                                        @if(!empty($tracklist->preview))
                                                        <i class="fa fa-check-circle pull-right" aria-hidden="true"></i>
                                                        @endif
                                                    </h4>
                                                    <div class="row no-gutters">
                                                        <div class="col-xl-12">
                                                            <form method="POST" action="{{ route('admin.tracklist.upload.preview',['id'=>$tracklist->id]) }}" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                       <input id="name" type="file" class="form-control" name="audio" value="" required autofocus>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-4">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            SUBMIT
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                            <div class="au-card chart-percent-card">
                                                <div class="au-card-inner">
                                                    <h4 class="title-2 tm-b-5">File</h4>
                                                    <div class="row no-gutters">
                                                        <div class="col-xl-12">
                                                            <form method="POST" action="{{ route('admin.tracklist.upload.zip',['id'=>$tracklist->id]) }}" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <input id="name" type="file" class="form-control" name="audio" value="{{ old('name') }}" required autofocus>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-4">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            SUBMIT
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            
            <div class="card-header">{{$tracklist->name}} Detail</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.tracklist.update',['id'=>$tracklist->id]) }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{$tracklist->name}}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                        <div class="col-md-8">
                            <select name="status" class="form-control" > 
                                <option value="active" @if($tracklist->status =='active') selected @endif >Active</option>
                                <option value="disabled" @if($tracklist->status =='disabled') selected @endif>Disable</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="release-date" class="col-md-4 col-form-label text-md-right">Release Date</label>

                        <div class="col-md-8">
                            <input id="release-date" type="text" class="form-control" name="release_date"  value="{{$tracklist->release_date}}"required>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                SUBMIT
                            </button>
                        </div>
                    </div>
                </form>
            </div>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>
                            
                <!-- END MAIN CONTENT-->
    @endsection
