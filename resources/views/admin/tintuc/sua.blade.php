
@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
<<<<<<< HEAD
=======
                      @if(count($errors)>0)
                        <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                            {{$err}}<br>
                          @endforeach
                        </div>
                      @endif
                      @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                      @endif
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể Loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option
                                             @if($tintuc->loaitin->theloai->id == $tl->id)
                                                {{"selected"}}
                                             @endif

                                                value="{{$tl->id}}">{{$tl->Ten}}
<<<<<<< HEAD
                                        </option>   
=======
                                        </option>
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                     @foreach($loaitin as $lt)
<<<<<<< HEAD
                                        <option 
=======
                                        <option
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                                             @if($tintuc->loaitin->id == $lt->id)
                                                {{"selected"}}
                                             @endif

                                             value="{{$lt->id}}">{{$lt->Ten}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input name="TieuDe" class="form-control" name="txtCateName" placeholder="Vui lòng nhập tiêu đề" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Nổi Bật</label>
                                <label class="radio-inline">
<<<<<<< HEAD
                                    <input name="NoiBat" value="0" 
=======
                                    <input name="NoiBat" value="0"
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                                    @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                    @endif

                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
<<<<<<< HEAD
                                    <input name="NoiBat" value="1" 
=======
                                    <input name="NoiBat" value="1"
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                                    @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                    @endif

                                    type="radio">Có
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea name="TomTat" class="form-control" rows="3"></textarea>
                            </div>
<<<<<<< HEAD
                            <div class="form-group">    
=======
                            <div class="form-group">
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                                <label>Hình Ảnh</label>
                                <p>
                                    <img width="400px" src="image/{{$tintuc->Hinh}}">
                                </p>
                                <input type="file" name="Hinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3" value="{{$tintuc->NoiDung}}" ></textarea>
<<<<<<< HEAD
                            </div>                            
=======
                            </div>
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection

        @section('script')
        <script>
            $(document).ready(function(){
                $('#TheLoai').change(function(){
                    var idTheLoai = $(this).val();
                    $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                       $('#LoaiTin').html(data);
                    });
                });
            });
        </script>
<<<<<<< HEAD
        @endsection
=======
        @endsection
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
