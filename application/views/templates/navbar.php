
<header class="section-header sticky-top sticky">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">


        </div>
    </nav>


    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <a class="navbar-brand" href="<?php echo base_url('/') ?>"><img class="logo" src="<?php echo base_url('assets/images/logos/retailrush-logo.png');?>" alt="Retailrush.lk logo" title="Retail Rush"></a>
                    </div> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-sm-6">
                    <form action="<?php echo base_url('products/search'); ?>" method="POST" class="search-wrap">
                        <div class="input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-3 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="#" class="icontext" data-toggle="dropdown">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-shopping-cart"></i></div>
                                <div class="text-wrap">
                                    <small>Basket</small>

                                    <?php
                                    $count = 0;
                                    if(isset($_SESSION["cart_item"])) {
                                        foreach ($_SESSION["cart_item"] as $item) {

                                            $count += $item["quantity"];
                                        }
                                    }
                                    ?>
                                    <span><?php echo $count;?> items</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div id="shopping-cart">

<!--                                    <a id="btnEmpty" href="--><?php //base_url('?action=empty')?><!--">Empty Cart</a>-->
                                    <?php
                                    if(isset($_SESSION["cart_item"])){
                                        $total_quantity = 0;
                                        $total_price = 0;

                                        ?>
                                        <table class="tbl-cart" cellpadding="10" cellspacing="1">
                                            <tbody>
                                            <tr>
                                                <th style="text-align:left;"></th>
                                                <th style="text-align:right;" width="5%">Quantity</th>
                                                <th style="text-align:right;" width="10%">Unit Price</th>
                                                <th style="text-align:right;" width="10%">Price</th>
                                                <th style="text-align:center;" width="5%"></th>
                                            </tr>
                                            <?php
                                            foreach ($_SESSION["cart_item"] as $item){
                                                $item_price = $item["quantity"]*$item["price"];
                                                ?>
                                                <tr>
                                                    <td><img src="<?php echo base_url($item["image"]); ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                                                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                                    <td  style="text-align:right;"><?php echo "Rs.".$item["price"]; ?></td>
                                                    <td  style="text-align:right;"><?php echo "Rs.". number_format($item_price,2); ?></td>
                                                    <td style="text-align:center;">
                                                    <a href="<?php echo base_url(uri_string().'?action=remove&id='.$item["id"]);?>" ><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $total_quantity += $item["quantity"];
                                                $total_price += ($item["price"]*$item["quantity"]);
                                            }
                                            ?>

                                            <tr>
                                                <td align="right">Total:</td>
                                                <td align="right"><?php echo $total_quantity; ?></td>
                                                <td></td>
                                                <td align="right" ><strong><?php echo "Rs.".number_format($total_price, 2); ?></strong></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <a href="<?php echo base_url('order/checkout');?>" class="btncheckout btn btn-success">Checkout</a>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="no-records">Your Cart is Empty</div>
                                        <?php
                                    }
                                    ?>

                        </div>
                            </div> <!--  dropdown-menu .// -->

                        </div> <!-- widget .// -->
                        <?php
                        if($this->session->userdata('username')){ ?>
                        <div class="widget-header dropdown">
                            <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-user"></i></div>
                                <div class="text-wrap">
                                    <span>
                                        <?php echo $this->session->userdata('username'); ?>
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo base_url('users/profile') ?>">Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url('userauth/logout') ?>">Logout</a>
                            </div> <!--  dropdown-menu .// -->
                        </div> <!-- widget  dropdown.// -->

                        <?php } else { ?>

                            <a href="<?php echo base_url('userauth/login'); ?>" class="ml-3 icontext">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-user"></i></div>
                                <div class="text-wrap">
                                    <span>
                                        Login
                                    </span>
                                </div>
                            </a>


                        <?php } ?>


                    </div>	<!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->

</header> <!-- section-header.// -->
