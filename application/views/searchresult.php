

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
    <div class="container">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category name</a></li>
                <li class="breadcrumb-item"><a href="#">Sub category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
        </nav>

        <div class="row">

            <aside class="col-xl-3 col-md-4 col-sm-12">
                <div class="card">
                    <article class="card-group-item">
                        <header class="card-header"><h6 class="title">Similar category </h6></header>
                        <div class="filter-content">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item">Cras justo odio <span class="float-right badge badge-secondary round">142</span> </a>
                                <a href="#" class="list-group-item">Dapibus ac facilisis  <span class="float-right badge badge-secondary round">3</span>  </a>
                                <a href="#" class="list-group-item">Morbi leo risus <span class="float-right badge badge-secondary round">32</span>  </a>
                                <a href="#" class="list-group-item">Another item <span class="float-right badge badge-secondary round">12</span>  </a>
                            </div>  <!-- list-group .// -->
                        </div>
                    </article> <!-- card-group-item.// -->
                </div> <!-- card.// -->
            </aside> <!-- col // -->
            <div class="col-xl-9 col-md-8 col-sm-12">

                <div class="row-sm">
                    <?php if($product_data) {

                        foreach ($product_data as $k => $v): ?>

                            <div class="col-md-3">
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
                                            <a href="#0" class="btn btn-sm btn-warning float-right js-cd-add-to-cart" data-price="<?php echo($v['product_info']['price']); ?>" data-image="<?php echo base_url('assets/images/items/3.jpg');?>" data-name="<?php echo($v['product_info']['name']); ?>"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div> <!-- price-wrap.// -->

                                    </figcaption>
                                </figure> <!-- card // -->
                            </div> <!-- col // -->

                        <?php
                        endforeach;
                    }else{
                    ?>

                          <p>No Such Product or Category is available</p>

                    <?php }?>

                </div> <!-- row.// -->

            </div> <!-- col // -->
        </div> <!-- row.// -->



    </div><!-- container // -->
</section>