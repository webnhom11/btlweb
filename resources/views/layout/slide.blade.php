<!--/banner-->
    <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $i = 0?>
                @foreach($slide as $sl)               
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" 

                    @if($i == 0)
                        class="active"
                    @endif

                    ></li>
                <?php $i++;?>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $i = 0; ?>
                @foreach($slide as $sl)
                    <div 
                        @if($i == 0)
                            class="carousel-item active"
                        @else                           
                            class="carousel-item" 
                        @endif
                         style="background-image: url('upload/slide/{{$sl->Hinh}}');">
                        <?php $i++; ?>
                    <div class="carousel-caption">
                        <h3>{{$sl->Ten}}
                            <!-- <span style="color: white !important;">{!!$sl->NoiDung!!}</span> -->
                        </h3>
                        <div class="read">
                            <a href="{{$sl->link}}" class="btn btn-primary read-m">Xem thêm</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--/model-->
    <!--//banner-->