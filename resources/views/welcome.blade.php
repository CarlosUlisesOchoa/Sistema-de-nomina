@extends('layouts.app')

@section('extra-css')
<style>
.slide {
    position: relative;
    margin: 0px auto;
    width: 80%;
    height: 70vh;
    
  }
  
  .slide ul li {
    position: absolute;
    left: 0;
    top: 0;
    display: block;
    width: 100%;
    height: 100%;
    list-style: none;
    border: 2px solid #ddd;
    border-radius: 4px;
    padding: 10%;
  }
  
  .slide .dots {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 20px;
    width: 100%;
    z-index: 3;
    text-align: center;
  }
  
  .slide .dots li {
    display: inline-block;
    margin: 0 10px;
      width: 10px;
      height: 10px;
      border: 2px solid #fff;
      border-radius: 50%;
    opacity: 0.4;
      cursor: pointer;
      transition: background .5s, opacity .5s;
    list-style: none;
  }
  
  .slide .dots li.active {
    background: #fff;
      opacity: 1;
  }
  
  .slide .arrow {
    position: absolute;
    z-index: 2;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: background .5s, opacity .5s;
  }
  
  .slide .arrow .arrow-left,
  .slide .arrow .arrow-right {
    position: absolute;
    top: 50%;
    margin-top: -25px;
    display: block;
    width: 50px;
    height: 50px;
    cursor: pointer;
    opacity: 0.5;
      transition: background .5s, opacity .5s;
  }
  
  .slide .arrow  .arrow-left:hover,
  .slide .arrow  .arrow-right:hover {
    opacity: 1;
  }
  
  .slide .arrow .arrow-left {
    left: 20px;
    background: url("./images/arrow-left.png");
  }
  
  .slide .arrow .arrow-right {
    right: 20px;
    background: url("./images/arrow-right.png");
  }
</style>
@endsection  

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Shane Corporation - Página principal</div>

                <div class="card-body">
                    <div class="text-center">
                        <span class="display-4">Nuestra empresa</span>
                    </div>
                    <div class="slide">
                        <ul>
                            <li data-bg="{{asset('images/corp.jpg')}}"></li>
                            <li data-bg="{{asset('images/lab.jpg')}}"></li>
                            <li data-bg="{{asset('images/we.jpg')}}"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-scripts')
<script src="{{ asset('js/jquery.slide.js')}}"></script>

<script>
$(function() {
  $('.slide').slide({

    // auto play
    isAutoSlide: true, 

    // pause on hover
    isHoverStop: true,

    // pause when window loses focus
    isBlurStop: true,

    // shows pagination bullets
    isShowDots: true,

    // shows navigation arrows
    isShowArrow: true,

    // shows navigation arrows on hover
    isHoverShowArrow: true,

    // load all images on load
    isLoadAllImgs: true,

    // sliding speed
    slideSpeed: 5000,

    // switching speed
    switchSpeed: 500,

    // click, mouseover or mouseenter
    dotsEvent: 'click',

    // default CSS classes
    dotsClass: 'dots',  
    dotActiveClass: 'active', 
    arrowClass: 'arrow',
    arrowLeftClass: 'arrow-left', 
    arrowRightClass: 'arrow-right'

  });
});
</script>
@endsection
