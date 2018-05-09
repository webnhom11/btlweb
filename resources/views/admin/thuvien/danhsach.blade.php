@extends('admin.layout.index')

@section('css')
<style type="text/css">
	.gallery img{
		transform: 1s;
		width: 200px;
		height: 140px;
		margin: 5px;
		object-fit: cover;
		opacity: .8;
		transform: scale(.9);
	}

	.gallery img:hover{
		box-shadow: 0 0 7px rgba(0, 0, 0, .5);
		opacity: 1;
		transform: scale(1) rotate(2deg);
	}

	#lightbox .modal-content {
	    display: inline-block;
	    text-align: center;  
	    width: 100%     
	}

	#lightbox .close {
	    opacity: 1;
	    color: rgb(255, 255, 255);
	    background-color: rgb(25, 25, 25);
	    padding: 5px 8px;
	    border-radius: 10px;
	    border: 1px solid rgb(255, 255, 255);
	    position: absolute;
	    top: -15px;
	    right: -55px;	    
	    z-index:1032;
	}

	.file-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
	}
	.file-preview-input input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}
	.file-preview-input-title {
	    margin-left:2px;
	}
</style>
@endsection

@section('content')

<div id="page-wrapper">
	<br>
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="input-group file-preview">
		<form action="admin/thuvien/danhsach" method="POST" enctype="multipart/form-data"> 
		<!-- file-preview-clear button -->
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<div class="btn btn-default file-preview-input"> 
				<label>
					<span class="glyphicon glyphicon-folder-open"></span> 
					<span class="file-preview-input-title">Chọn hình ảnh</span>
				</label>
				<input type="file" name="Hinh" id="anh" />
				<!-- rename it --> 
			</div>
			<button type="submit" class="btn btn-labeled btn-primary"> 
				<span class="btn-label">
					<i class="glyphicon glyphicon-upload"></i> 
				</span>Tải lên
			</button>
		</form>
	<hr>
	<div class="row">
		<div class="gallery">
			@foreach($files as $f)
				<div class="col-lg-3 col-md-4">
					<a href="#" data-toggle="modal" data-target="#lightbox"> 
						<img src="upload/tintuc/{{$f}}" class="img-rounded">	
					</a>
				</div>	
			@endforeach
		</div>
	</div>
	<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" align="center">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true" id="close">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {

		$('#anh').change(function() {
		  	var i = $(this).prev('label').clone();
		  	var file = $('#anh')[0].files[0].name;
		  	$(this).prev('label').text(file);
		});

		$(".alert").show().delay(2000).fadeOut();

	    var $lightbox = $('#lightbox');
	    
	    $('[data-target="#lightbox"]').on('click', function(event) {
	        var $img = $(this).find('img'), 
	            src = $img.attr('src'),
	            alt = $img.attr('alt'),
	            css = {
	                'width': '100%',
	                'height': 'auto'
	            };

	        $lightbox.find('.close').addClass('hidden');
	        $lightbox.find('img').attr('src', src);
	        $lightbox.find('img').attr('alt', alt);
	        $lightbox.find('img').css(css);

	        $('#side-menu').hide();
	    });
	    
	    $lightbox.on('shown.bs.modal', function (e) {
	        var $img = $lightbox.find('img');	       
	        // $lightbox.find('.modal-dialog').css({'width': $img.width()});
	        $lightbox.find('.close').removeClass('hidden');  
	    });

	    $('#close').click(function(){
	    	$('#side-menu').show();
	    }); 
	});
</script>
@endsection
