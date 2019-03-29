@extends('layout.index')
@section('content')
<!-- Page Content -->
<div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">TrissWiL</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on : {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{!!$tintuc->NoiDung!!}
                </p>

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    @foreach($tinlienquan as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px;">{{$tt->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach

                        
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                    @foreach($tinnoibat as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <<div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 5px;"> {{$tt->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach

                        
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection