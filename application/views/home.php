
<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-y-sm">
<div class="container">
<div class="card">
	<div class="card-body">
<div class="row row-sm">
	<aside class="col-md-3">
<h5 class="text-uppercase">Our Markets</h5>
	<ul class="menu-category">
        <?php
        $i=1;
        foreach ($category as $k => $v):
            if($i<=5) {
                if($v['parent_category']=='None'){
                ?>
                <li><a href="<?php echo base_url('products/search'); ?>"><?php echo $v['parent_category']; ?> </a></li>
                <?php
            }else{
                ?>
            <li class="has-submenu"> <a href="#"><?php echo $v['parent_category']; ?>  <i class="icon-arrow-right pull-right"></i></a>

<!--                <ul class="submenu">-->
<!--				<li> <a href="--><?php //echo base_url('products/search/'.$v['name']); ?><!--">--><?php //echo $v['name']; ?><!-- </a></li>-->
<!--                </ul>-->

		    </li>
        <?php
                }
            }
            $i=$i+1;
        endforeach ?>

        <li class="has-submenu"> <a href="#">More category  <i class="icon-arrow-right pull-right"></i></a>
			<ul class="submenu">
				<li> <a href="#">Food &amp Beverage </a></li>
				<li> <a href="#">Home Equipments </a></li>
				<li> <a href="#">Machinery Items </a></li>
				<li> <a href="#">Toys & Hobbies  </a></li>
				<li> <a href="#">Consumer Electronics  </a></li>
				<li> <a href="#">Home & Garden  </a></li>
				<li> <a href="#">Beauty & Personal Care  </a></li>
			</ul>
		</li>
	</ul>

	</aside> <!-- col.// -->
	<div class="col-md-6">

<!-- ================= main slide ================= -->
<div class="owl-init slider-main owl-carousel" data-items="1" data-nav="true" data-dots="false">
	<div class="item-slide">
		<img src="<?php echo base_url('assets/images/banners/slide1.jpg');?>">
	</div>
	<div class="item-slide">
		<img src="<?php echo base_url('assets/images/banners/slide2.jpg');?>">
	</div>
	<div class="item-slide">
		<img src="<?php echo base_url('assets/images/banners/slide3.jpg');?>">
	</div>
</div>
<!-- ============== main slidesow .end // ============= -->

	</div> <!-- col.// -->
	<aside class="col-md-3">

<h6 class="title-bg bg-secondary"> Qualified Suppliers</h6>
<div style="height:280px;">
	<figure class="itemside has-bg border-bottom" style="height: 33%;">
		<img class="img-bg" src="<?php echo base_url('assets/images/items/item-sm.png');?>">
		<figcaption class="p-2">
			<h6 class="title">One request, many offers </h6>
			<a href="#">Good link</a>
		</figcaption>
	</figure>

	<figure class="itemside has-bg border-bottom" style="height: 33%;">
		<img class="img-bg" src="<?php echo base_url('assets/images/items/1.jpg');?>" height="80">
		<figcaption class="p-2">
			<h6 class="title">One request, many offers </h6>
			<a href="#">Good link</a>
		</figcaption>
	</figure>
	<figure class="itemside has-bg border-bottom" style="height: 33%;">
		<img class="img-bg" src="<?php echo base_url('assets/images/items/2.jpg');?>" height="80">
		<figcaption class="p-2">
			<h6 class="title">One request, many offers </h6>
			<a href="#">Good link</a>
		</figcaption>
	</figure>
</div>

	</aside>
</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</div> <!-- card.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->


<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request bg padding-y-sm">
<div class="container">
<header class="section-heading heading-line">
	<h4 class="title-section bg text-uppercase">Recommended items</h4>
</header>

<div class="row-sm">
    <?php if($product_data) {

        foreach ($product_data as $k => $v): ?>

            <div class="col-md-2">
                <figure class="card card-product">
                    <?php if( $v['product_info']['offer']){?>
                    <span class="badge-offer"><b>-<?php  echo($v['product_info']['offer']); ?></b></span>
                    <?php }?>
                    <div class="img-wrap"><img src="<?php echo base_url($v['product_info']['image']);?>"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="<?php echo base_url('products/product/'.$v['product_info']['id']) ?>"><?php echo($v['product_info']['name']); ?></a></h6>

                        <div class="price-wrap">
                            <span class="currency">Rs.</span><span class="price-new"><?php echo($v['product_info']['price']); ?></span>
                            <?php if($v['product_info']['cut_price']):?><span class="currency">Rs.</span><del class="price-old"><?php echo($v['product_info']['cut_price']); ?></del><?php endif;?>
<!--                            <a href="#0" class="btn btn-sm btn-warning float-right js-cd-add-to-cart" data-id="--><?php //echo($v['product_info']['id']); ?><!--" data-price="--><?php //echo($v['product_info']['price']); ?><!--" data-image="--><?php //echo base_url($v['product_info']['image']);?><!--" data-name="--><?php //echo($v['product_info']['name']); ?><!--"><i class="fa fa-shopping-cart"></i> Add to cart</a>-->

                            <form method="POST" action="<?php echo base_url('?action=add&id='.$v['product_info']['id']); ?>">
                                <input type="submit" value="Add to Cart" class="btnAddAction btn btn-warning" />
                            </form>
                        </div> <!-- price-wrap.// -->

                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->

        <?php
        endforeach;
    }
         ?>


</div> <!-- row.// -->


</div><!-- container // -->
</section>
<!-- ========================= SECTION ITEMS .END// ========================= -->

<!-- ========================= SECTION LINKS ========================= -->
<section class="section-links bg padding-y-sm">
<div class="container">
<div class="row">
	<div class="col-sm-6">
<header class="section-heading heading-line">
	<h4 class="title-section bg text-uppercase">Fast Sale</h4>
</header>

<ul class="list-icon row">
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-usa.png"><span>United States</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-in.png"><span>India</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-tr.png"><span>Turkey</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-kr.png"><span>Korea</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-tr.png"><span>Turkey</span></a></li>
	<li class="col-md-4"><a href="#"><img src="images/icons/flag-kr.png"><span>Korea</span></a></li>
</ul>
	</div> <!-- col // -->

    <?php if($featured_product_data) { ?>


    <div class="col-sm-6">
<header class="section-heading heading-line">
	<h4 class="title-section bg text-uppercase">Featured</h4>
</header>
<ul class="list-icon row">
        <?php foreach ($featured_product_data as $k => $v): ?>

            <li class="col-md-6">
        <div class="card">
            <figure class="itemside">
                <div class="aside"><div class="img-wrap img-sm border-right"><img src="<?php echo base_url($v['featured_product_info']['image']);?>"></div></div>
                <figcaption class="p-3">
                    <h6 class="title"><a href="<?php echo base_url('products/product/'.$v['featured_product_info']['id']) ?>"><?php echo($v['featured_product_info']['name']); ?></a></h6>
                    <div class="price-wrap">
                        <span class="price-new b">Rs.<?php echo($v['featured_product_info']['price']); ?></span>
            <?php if($v['featured_product_info']['cut_price']):?>Rs. <del class="price-old text-muted"><?php echo($v['featured_product_info']['cut_price']); ?></del> <?php endif;?>
                    </div> <!-- price-wrap.// -->
                </figcaption>
            </figure>
        </div> <!-- card.// -->

    </li>
       <?php endforeach; ?>
</ul>
	</div> <!-- col // -->

    <?php } ?>
</div><!-- row // -->

<figure class="mt-3 banner p-3 bg-secondary">
	<div class="text-lg text-center white">Another banner can be here</div>
</figure>

</div><!-- container // -->
</section>
<!-- ========================= SECTION LINKS END.// ========================= -->

<!-- ========================= SECTION SUBSCRIBE ========================= -->
<section class="section-subscribe bg-secondary padding-y-lg">
<div class="container">

<p class="pb-2 text-center white">Delivering the latest product trends and industry news straight to your inbox</p>

<div class="row justify-content-md-center">
	<div class="col-lg-4 col-sm-6">
<form class="row-sm form-noborder">
		<div class="col-8">
		<input class="form-control" placeholder="Your Email" type="email">
		</div> <!-- col.// -->
		<div class="col-4">
		<button type="submit" class="btn btn-block btn-warning"> <i class="fa fa-envelope"></i> Subscribe </button>
		</div> <!-- col.// -->
</form>
<small class="form-text text-white-50">We’ll never share your email address with a third-party. </small>
	</div> <!-- col-md-6.// -->
</div>


</div> <!-- container // -->
</section>
<!-- ========================= SECTION SUBSCRIBE END.//========================= -->
