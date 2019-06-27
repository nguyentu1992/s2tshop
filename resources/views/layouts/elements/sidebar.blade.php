<?php
$siteBar = \App\Models\Category::where('status', 1)->get();
?>
<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach($siteBar as $sitebar)
        @if($sitebar->parent_id == 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#href-{{$sitebar->id}}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{ $sitebar->name }}
                    </a>
                </h4>
            </div>
            <div id="href-{{$sitebar->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        @foreach($siteBar as $item)
                        @if($sitebar->id == $item->parent_id)
                        <li><a href="{{ route('list_product', ['category_id' => $item->id]) }}">{{ $item->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div><!--/category-products-->

    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="2000000" data-slider-step="5" data-slider-value="[0,0]" id="sl2" ><br />
            <b class="pull-left">0 VNĐ</b> <b class="pull-right">2.000.000 VNĐ</b>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->

</div>