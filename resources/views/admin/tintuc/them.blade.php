@extends('admin.layout.index')

@section('css')
<style type="text/css">
    #OpenImgUpload {
        background-image:url('');
        background-size:cover;
        background-position: center;
        height: 200px; width: 200px;
        border: 1px solid #bbb;
    }
</style>
@endsection


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
                           <!--  <div class="form-group">
                                <label>Hình ảnh</label>
                                <p></p>
                                <input type="file" name="Hinh" class="form-control">
                            </div> -->       
                            <div class="form-group">  
                                <p><b>Ảnh đại diện</b></p>              
                                <input type="file" id="imgupload" style="display:none" name="Hinh" /> 
                                <button type="button" id="OpenImgUpload"><i id="plus" class="fa fa-plus" style="font-size:36px"></i></button>
                                <p id="capnhat">Nhấn vào ảnh để thay đổi</p>
                                <a href="#" id="xoa">Xóa ảnh đại diện</a>
                            <div>
                            <br>      

                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Có
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

                            <div id="myModal2" class="modal">
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
                    console.log(data);

                   dulieu = data;
                });
            }); 


            var modal = document.getElementById('myModal');

            //thư viện
            var modal2 = document.getElementById('myModal2');
            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");         

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
                $('#side-menu').hide();

                // lấy dữ liệu nhập từ nội dung
                var noidung = CKEDITOR.instances["noidung"].getData();
                // $('#test').html(noidung);
                console.log(dulieu);
                for (i = 0; i < dulieu.length; i++) {
                    compare(noidung, dulieu[i].NoiDung, dsSoSanh);
                }
                console.log(dsSoSanh);

                var table = '';

                for(var r = 0; r < dulieu.length; r++){
                    var url = 'tintuc/' + dulieu[r].id + '/' + dulieu[r].TieuDeKhongDau + '.html';
                    table += '<tr>';
                        table += '<td><a href="' + url + '">' + dulieu[r].TieuDe + '</a></td>';
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
                $('#side-menu').show();
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


            // bấm nút thư viện
            $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });

            $('#capnhat').hide();
            $('#xoa').hide();

            $('#imgupload').change(function() {
                var getImagePath = URL.createObjectURL(event.target.files[0]);
                $('#OpenImgUpload').css('background-image', 'url(' + getImagePath + ')');
                $("#plus").removeClass( "fa fa-plus" );
                $('#capnhat').show();
                $('#xoa').show();
                // console.log($(this).val());
            });

            $('#xoa').click(function(e){
                e.preventDefault();
                $('#OpenImgUpload').css('background-image', 'url(\'\')');
                $("#plus").addClass( "fa fa-plus" );
                $('#capnhat').hide();
                $('#xoa').hide();
                $('#imgupload').val('');
            });
        });
    </script>
@endsection