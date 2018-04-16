@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
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
                        <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" id="tieude" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="tomtat" name="TomTat" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="noidung" name="NoiDung" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="Hinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Có
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Thông báo chuyên gia</label>
                                <label class="radio-inline">
                                    <input name="GuiMail" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="GuiMail" value="1" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>

                            <!-- chức năng so sánh, kiểm tra -->
                            <button type="button" id="myBtn" class="btn btn-default">Kiểm tra</button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                              <!-- Modal content -->
                              <div class="modal-content">
                                <span class="close">&times;</span>
                                <div id="table">
                                    
                                </div>
                              </div>
                            </div>

                        <form>
                    </div>                   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script>

        CKEDITOR.replace( 'noidung', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
            height: 320
        } );

        CKEDITOR.replace( 'tomtat', {
            extraPlugins: 'mathjax',
            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
            height: 320
        } );  

        $(document).ready(function(){

            var dulieu = [];  
            var table = '';
            var dsSoSanh = [];     
            const stopWords = buildStopwords(stopwords);     
           
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/" + idTheLoai, function(data){
                    $("#LoaiTin").html(data);
                });
            });
        
            // thêm chức năng so sánh
            $("#LoaiTin").change(function(){
                var idLoaiTin = $(this).val();
                $.get("admin/ajax/tintuc/" + idLoaiTin, function(data){
                    // $("#LoaiTin").html(data);
                   // console.log(data[0].TieuDe);
                   dulieu = data;
                });
            }); 




            var modal = document.getElementById('myModal');

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";

                // lấy dữ liệu nhập từ nội dung
                var noidung = CKEDITOR.instances["noidung"].getData();
                // $('#test').html(noidung);
                // console.log(dulieu);
                for (i = 0; i < dulieu.length; i++) {
                    compare(noidung, dulieu[i].NoiDung, dsSoSanh);
                }
                console.log(dsSoSanh);

                var table = '';

                for(var r = 0; r < dulieu.length; r++){
                    table += '<tr>';
                        table += '<td>' + dulieu[r].TieuDe + '</td>';
                        table += '<td>' + dsSoSanh[r] + '</td>';
                    table += '</tr>';
                }

                $('#table').html('<table class="table table-striped table-bordered table-hover">'  
                                    + '<tr>'
                                    + '<th>Tiêu đề</th>'
                                    + '<th>Độ trùng lặp</th>'
                                    + '</tr>'
                                    + table + '</table>');

            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // Hàm so sánh
            function compare(doc1, doc2, array) {
                // chuyển toàn bộ chuỗi đầu vào thành chuỗi chữ cái
                const cleanD1 = sanitizeDoc(doc1, stopWords);
                const cleanD2 = sanitizeDoc(doc2, stopWords);
                console.log(cleanD1+"\n", cleanD2);
                const vectors = buildVectors(cleanD1, cleanD2);
                const v1 = vectors[0];
                const v2 = vectors[1];
                const sim = Math.round((cosim(v1, v2)*100)*10)/10+"%";
                array.push(sim);
            }
        });
    </script>
@endsection