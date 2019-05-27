<div class="section-main bg padding-y-sm">
    <div class="container">
        <div class="row">

        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/')?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category name</a></li>
                <li class="breadcrumb-item"><a href="#">Sub category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">

            <div class="row no-gutters">
        <aside class="col-sm-5 border-right">
            <article class="gallery-wrap">
                <div class="img-big-wrap">
                    <div> <a href="<?php echo base_url($product_data['image']);?>" data-fancybox=""><img src="<?php echo base_url($product_data['image']);?>"></a></div>
                </div> <!-- slider-product.// -->

            </article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
            <article class="p-5">
                <h3 class="title mb-3"><?php echo $product_data['name'];?></h3>

                <div class="mb-3">
                    <var class="price h3 text-warning">
                        <span class="currency">Rs.</span><span class="num"><?php echo $product_data['price'];?></span>
                        <?php if($product_data['cut_price']):?><del class="price-old"><span class="currency"> Rs.</span><?php echo($product_data['cut_price']); ?></del><?php endif;?>

                    </var>
                </div> <!-- price-detail-wrap .// -->
                <dl>
                    <dt>Description</dt>
                    <dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco </p></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3">Model#</dt>
                    <dd class="col-sm-9">12345611</dd>

                    <dt class="col-sm-3">Color</dt>
                    <dd class="col-sm-9">Black and white </dd>

                    <dt class="col-sm-3">Delivery</dt>
                    <dd class="col-sm-9">Russia, USA, and Europe </dd>
                </dl>

                <hr>
                <div class="row">
                    <div class="col-sm-5">
                        <dl class="dlist-inline">
                            <dt>Quantity: </dt>
                            <dd>
                                <select class="form-control form-control-sm" style="width:70px;">
                                    <option> 1 </option>
                                    <option> 2 </option>
                                    <option> 3 </option>
                                </select>
                            </dd>
                        </dl>  <!-- item-property .// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
                <hr>
                <form method="POST" action="<?php echo base_url(uri_string().'?action=add&id='.$product_data['id']); ?>">
                    <input type="submit" value="Add to Cart" class="btn btn-warning" />
                </form>
            </article> <!-- card-body.// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
            </div>
</div> <!-- card.// -->
            <article class="card mt-3">
                <div class="card-body">
                    <?php if($product_data['details']):?>
                    <h4>Detail overview</h4>
                    <p><?php echo $product_data['details'];?></p>
                    <?php endif ?>
                </div> <!-- card-body.// -->
            </article> <!-- card.// -->


        </div>

    </div>

</div>
