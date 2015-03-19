@extends('_layouts.default')

@section('content')


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 50%;margin: 0 auto">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://7xi41c.com1.z0.glb.clouddn.com/srcoll_h400-3-1-1.jpg" alt="First slide"
                     style="height: 400px;width: 100%">

                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>

                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="http://7xi41c.com1.z0.glb.clouddn.com/srcoll_h400-2-1-1.jpg" alt="Second slide"
                     style="height: 400px;width: 100%">

                <div class="container">
                    <div class="carousel-caption">
                        <h1></h1>

                        <p></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="http://7xi41c.com1.z0.glb.clouddn.com/srcoll_h400-1-1-1.jpg" alt="Third slide"
                     style="height: 400px;width: 100%;">

                <div class="container">
                    <div class="carousel-caption">

                        <h1></h1>

                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


        <!-- START THE FEATURETTES -->
        @foreach ($release as $key=>$release)
            @if($key%2 == 0)
                <hr class="featurette-divider">
                <div class="row featurette" style="width: 75%;margin: 0 auto">
                    <div class="col-md-7" style="float: left">
                        <h2 class="featurette-heading"><a href="{{ URL('release/'.$release->id) }}"
                                                          style="color: #222;text-decoration: none;">{{ $release->title }}</a>
                            <br/><span class="text-muted">发售日期:{{ date("Y-m-d ",$release->timestamp) }}</span></h2>

                        <p class="lead">货号：{{ $release->article_number }}</p>
                    </div>
                    <div class="col-md-5" style="float: right;">
                        <img class="featurette-image img-responsive" src="{{ $release->image }}"
                             alt="Generic placeholder image">
                    </div>
                </div>
            @else
                <hr class="featurette-divider">

                <div class="row featurette" style="width: 75%;margin: 0 auto;">
                    <div class="col-md-5" style="float: left">
                        <img class="featurette-image img-responsive" src="{{ $release->image }}"
                             alt="Generic placeholder image">
                    </div>
                    <div class="col-md-7" style="float: right">
                        <h2 class="featurette-heading"><a href="{{ URL('release/'.$release->id) }}"
                                                          style="color: #222;text-decoration: none;">{{ $release->title }}</a>
                            <br/><span class="text-muted">发售日期:{{ date("Y-m-d ",$release->timestamp) }}</span></h2>

                        <p class="lead">货号：{{ $release->article_number }}</p>

                    </div>
                </div>
            @endif
        @endforeach

        <hr class="featurette-divider">
        <div style="display:block;position: fixed;left: 50%;bottom: 168px;margin-left: 550px;width: 258px;height: 258px;background: url(http://7xi41c.com1.z0.glb.clouddn.com/weixin_qrcode_for_gh_bd158cd08459_258.jpg) no-repeat;coursor:poionter"></div>
        <div style="display:block;position: fixed;right: 80%;bottom: 168px;margin-left: 50px;width: 258px;height: 258px;">
            <wb:follow-button uid="3983562899" type="red_3" width="100%" height="24" ></wb:follow-button>
        </div>
        <!-- /END THE FEATURETTES -->
    </div>



@endsection
