<section class="section-content bg padding-y border-top">
    <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content text-center p-md">

                <h2><span class="text-navy"><?php echo $this->session->userdata('username'); ?></span></h2>
                <p><?php echo $this->session->userdata('email'); ?></p>
                <hr>
                <div class="row">
                <div class="col-md-4">
                    <h4><span><i class="fa fa-map"></i> REGISTERED ADDRESS</span></h4>
                    <p><?php echo $user_data['address1']; ?></p>
                    <p><?php echo $user_data['address2']; ?></p>
                </div>

                    <div class="col-md-4">
                        <h4><span><i class="fa fa-phone"></i> CONTACT</span></h4>
                        <p><?php echo $user_data['phone']; ?></p>
                    </div>

                    <div class="col-md-4">

                        <?php
                        $total_orders=0;
                        foreach ($order_data as $k => $v):
                            $total_orders+=1;
                            ?>

                        <?php endforeach; ?>

                        <h4><span>TOTAL ORDERS</span></h4>
                        <h1><span><?php echo $total_orders; ?></span></h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


        <div class="card">
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Order ID</th>
                    <th scope="col" >Items</th>
                    <th scope="col" >Dlivery Charge</th>
                    <th scope="col" >Bill Total</th>
                    <th scope="col" >Payment Method</th>
                    <th scope="col" class="text-right">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if($order_data):
                foreach ($order_data as $k => $v): ?>

                <tr>
                        <td>
                            <?php echo date('d-m-Y', $v['order_info']['date']); ?>
                        </td>
                        <td>
                            <?php echo $v['order_info']['order_id']; ?>
                        </td>
                        <td>
                            <?php echo $v['order_info']['items']; ?>
                        </td>
                        <td>
                            <?php echo $v['order_info']['delivery_charge']; ?>
                        </td>
                        <td>
                            <div class="price-wrap">
                                <?php echo $v['order_info']['total']; ?>
                            </div> <!-- price-wrap .// -->
                        </td>
                        <td>
                            <?php echo $v['order_info']['method']; ?>
                        </td>
                        <td class="text-right">
                            <span class="label label-primary"><?php echo $v['order_info']['status']; ?></span>
                        </td>
                    </tr>

            <?php endforeach;
            endif;
            ?>

                <tr>
                    <td>
                        <a href="<?php echo base_url()?>" class="btn btn-warning">Continue Shopping</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div> <!-- card.// -->


    </div>
</section>