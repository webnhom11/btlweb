
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="trangchu">Trang chủ
                <span class="sr-only">(current)</span>
            </a>
        </li>    
        @foreach($theloai as $tl)    
            @if(count($tl->loaitin) > 0)
            <li class="nav-item dropdown">          
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{$tl->Ten}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">                
                    @foreach($tl->loaitin as $lt)
                        <div class="dropdown-divider"></div>
                            <a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html" class="dropdown-item">{{$lt->Ten}}</a> 
                        @endforeach
                </div>
            </li>
            @endif
        @endforeach
        <li class="nav-item">
            <a class="nav-link" href="gioithieu">Giới thiệu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="lienhe">Liên hệ</a>
        </li>

    </ul>
        <form action="timkiem" method="post" class="form-inline my-2 my-lg-0 header-search" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." name="tukhoa" required="">
            <button class="btn btn1 my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
</div>