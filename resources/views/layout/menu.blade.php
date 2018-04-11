<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
        	Menu
        </li>
      	
      	@foreach($theloai as $tl)
      		@if(count($tl->loaitin) > 0 )   <!-- Đếm số loại tin của thể loại, nếu > 0 thì in ra -->
		        <li href="#" class="list-group-item menu1">
		        	{{$tl->Ten}}
		        </li>


		        <ul>
		     		@foreach($tl->loaitin as $lt)
			    		<li class="list-group-item">
			    			{{$lt->Ten}}
			    		</li>		    		
		    		@endforeach
		        </ul>
		    @endif
        @endforeach
    </ul>
</div>
