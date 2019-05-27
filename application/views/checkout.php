<?php
if(isset($_SESSION["cart_item"])){
                            $total_quantity = 0;
                            $total_price = 0;
?>
    <form action="<?php echo base_url('order/create');?>" method="POST">
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
    <div class="container">

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>


        <div class="row">
            <main class="col-sm-9">

                <div class="card">
                    <table class="table table-hover shopping-cart-wrap">
                        <thead class="text-muted">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col" width="120">Quantity</th>
                            <th scope="col" width="120">Price</th>
                            <th scope="col" class="text-right" width="200">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $string=null;
                            foreach ($_SESSION["cart_item"] as $item){
                                $item_price = $item["quantity"]*$item["price"];
                                $string=$string.'<strong>'.$item["name"].'</strong> :'.$item["quantity"].'x'.$item["price"].'<br>';
                                ?>

                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="<?php echo base_url($item["image"]); ?>" class="img-thumbnail img-sm"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate"><?php echo $item["name"]; ?> </h6>
                                                <dl class="dlist-inline small">
                                                    <dt>Size: </dt>
                                                    <dd>XXL</dd>
                                                </dl>
                                                <dl class="dlist-inline small">
                                                    <dt>Color: </dt>
                                                    <dd>Orange color</dd>
                                                </dl>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <?php echo $item["quantity"]; ?>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price"><?php echo "Rs.". number_format($item_price,2); ?></var>
                                            <small class="text-muted">(<?php echo "Rs.".$item["price"]; ?> each)</small>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
                                        <a href="<?php echo base_url(uri_string().'?action=remove&id='.$item["id"]);?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Remove</a>

                                    </td>
                                </tr>

                                <?php
                                $total_quantity += $item["quantity"];
                                $total_price += ($item["price"]*$item["quantity"]);
                            }
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url()?>" class="btn btn-warning">Continue Shopping</a>
                                </td>
                            </tr>
                            <input type="hidden" id="items" name="items" value="<?php echo $string;?>">
                        </tbody>

                    </table>
                </div> <!-- card.// -->

            </main> <!-- col.// -->
            <aside class="col-sm-3">
                <p class="alert alert-success">
                <dl class="dlist-align">
                    <dt>Total price: </dt>
                    <dd class="text-right"><?php echo "Rs.".number_format($total_price, 2); ?></dd>
                </dl>
                <dl class="dlist-align">
                    <dt>Delivery:</dt>
                    <dd class="text-right">USD 658</dd>
                    <input type="hidden" id="delivery_charge" name="delivery_charge" value="<?php echo "Rs.".number_format($total_price, 2); ?>">
                </dl>
                </p>

                <dl class="dlist-align h4">
                    <dt>Total:</dt>
                    <dd class="text-right"><strong><?php echo "Rs.".number_format($total_price, 2); ?></strong></dd>
                    <input type="hidden" id="total" name="total" value="<?php echo "Rs.".number_format($total_price, 2); ?>">

                </dl>
                <hr>

                <dt>Payment Method:</dt>

                <div class="form-group">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="method" value="Cash on delivery" >
                        <span class="form-check-label"> Cash on delivery </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="method" value="Online Payment" checked>
                        <span class="form-check-label"> Visa/Master Card</span>
                    </label>
                </div> <!-- form-group end.// -->

            </aside> <!-- col.// -->
        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

    <div class="container">


        <div class="row">
            <div class="col-md-4">
                <h5><span>Registered Address</span></h5>
                <p><?php echo $user_data['address1']; ?></p>
                <p><?php echo $user_data['address2']; ?></p>
            </div>
            <div class="col-md-8">
                <h5><span>Delivery Address</span></h5>
                <dl class="dlist-align h4">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input id="address1" name="address1" type="text" class="form-control" placeholder="Address Line 1" value="<?php echo $user_data['address1']; ?>">
                        </div> <!-- form-group end.// -->
                        <div class="col-md-6 form-group">
                            <input type="text" id="address2" name="address2" class="form-control" placeholder="Address Line 2" value="<?php echo $user_data['address2']; ?>">
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row end.// -->

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Country</label>
                            <select id="country" name="country" class="form-control" disabled>
                                <option> Choose...</option>
                                <option>Uzbekistan</option>
                                <option>Russia</option>
                                <option selected="">Sri Lanka</option>
                                <option>India</option>
                                <option>Afganistan</option>
                            </select>
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-4">
                            <label>District</label>
                            <select id="district" name="district" class="form-control" disabled>
                                <option> Choose...</option>
                                <option>Uzbekistan</option>
                                <option>Russia</option>
                                <option selected="">Colombo</option>
                                <option>India</option>
                                <option>Afganistan</option>
                            </select>
                        </div> <!-- form-group end.// -->
                        <div class="form-group col-md-4">
                            <label>City</label>
                            <select id="city" name="city" class="form-control">
                                <option value="1" selected="">Akarawita</option>
                                <option value="2">Akuregoda</option>
                                <option value="3">Angoda</option>
                                <option value="4">Athurugiriya</option>
                                <option value="5">Avissawella</option>
                                <option value="6">Batawala</option>
                                <option value="7">Battaramulla</option>
                                <option value="8">Batugampola</option>
                                <option value="9">Bellanwila</option>
                                <option value="10">Bope</option>
                                <option value="11">Boralesgamuwa</option>
                                <option value="12">Colombo 1 (Fort)</option>
                                <option value="13">Colombo 10 (Panchikawatte, Maradana)</option>
                                <option value="14">Colombo 11 (Pettah)</option>
                                <option value="15">Colombo 12 (Hulfts Dorp)</option>
                                <option value="16">Colombo 13 (Kotahena,Kochchikade)</option>
                                <option value="17">Colombo 14 (Grandpass)</option>
                                <option value="18">Colombo 15 (Mutwal, Modara, Mattakuliya, Madampitiya)</option>
                                <option value="19">Colombo 2 (Slave lsland)</option>
                                <option value="20">Colombo 3 (Kollupitiya)</option>
                                <option value="21">Colombo 4 (Bambalapitiya)</option>
                                <option value="22">Colombo 5 (Havelock town,Kirulapane South)</option>
                                <option value="23">Colombo 6 (Wellawatta, Pamankada, Kirulapane North)</option>
                                <option value="24">Colombo 7 (Cinnamon Gardens)</option>
                                <option value="25">Colombo 8 (Borella)</option>
                                <option value="26">Colombo 9 (Dematagoda)</option>
                                <option value="27">Dedigamuwa</option>
                                <option value="28">Dehiwala</option>
                                <option value="29">Deltara</option>
                                <option value="30">Ethul Kotte</option>
                                <option value="31">Godagama</option>
                                <option value="32">Gothatuwa</option>
                                <option value="33">Habarakada</option>
                                <option value="34">Handapangoda</option>
                                <option value="35">Hanwella</option>
                                <option value="36">Hewainna</option>
                                <option value="37">Hiripitya</option>
                                <option value="38">Hokandara</option>
                                <option value="39">Homagama</option>
                                <option value="40">Horagala</option>
                                <option value="41">Ingiriya</option>
                                <option value="42">Kaduwela</option>
                                <option value="43">Kahathuduwa</option>
                                <option value="44">Kahawala</option>
                                <option value="45">Kalatuwawa</option>
                                <option value="46">Kaluaggala</option>
                                <option value="47">Kalubowila</option>
                                <option value="48">Kesbewa</option>
                                <option value="49">Kiriwattuduwa</option>
                                <option value="50">Kohuwala</option>
                                <option value="51">Kolonnawa</option>
                                <option value="52">Kosgama</option>
                                <option value="53">Kotikawatta</option>
                                <option value="54">Kottawa</option>
                                <option value="55">Kotte</option>
                                <option value="56">Madapatha</option>
                                <option value="57">Madiwela</option>
                                <option value="58">Maharagama</option>
                                <option value="59">Malabe</option>
                                <option value="60">Mattegoda</option>
                                <option value="61">Meegoda</option>
                                <option value="62">Meepe</option>
                                <option value="2087">Mirihana</option>
                                <option value="63">Moragahahena</option>
                                <option value="64">Moratuwa</option>
                                <option value="65">Mount Lavinia</option>
                                <option value="66">Mullegama</option>
                                <option value="67">Mulleriyawa New Town</option>
                                <option value="68">Napawela</option>
                                <option value="69">Navagamuwa</option>
                                <option value="70">Nawala</option>
                                <option value="71">Nugegoda</option>
                                <option value="72">Padukka</option>
                                <option value="73">Pannipitiya</option>
                                <option value="74">Pelawatta</option>
                                <option value="75">Peliyagoda</option>
                                <option value="76">Pepiliyana</option>
                                <option value="77">Piliyandala</option>
                                <option value="78">Pita Kotte</option>
                                <option value="79">Pitipana Homagama</option>
                                <option value="80">Polgasowita</option>
                                <option value="81">Puwakpitiya</option>
                                <option value="82">Rajagiriya</option>
                                <option value="83">Ranala</option>
                                <option value="84">Ratmalana</option>
                                <option value="85">Siddamulla</option>
                                <option value="86">Sri Jayawardenepura Kotte</option>
                                <option value="87">Talawatugoda</option>
                                <option value="88">Thalapathpitiya</option>
                                <option value="89">Tummodara</option>
                                <option value="90">Waga</option>
                                <option value="91">Watareka</option>
                                <option value="92">Wellampitiya</option>

                            </select>
                        </div> <!-- form-group end.// -->
                    </div> <!-- form-row.// -->
                </dl>

                <dl class="dlist-align h4 float-right">
                    <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $this->session->userdata('id'); ?>">
                    <input type="hidden" id="phone" name="phone" value="<?php echo $user_data['phone']; ?>">

                    <input type="submit" class="btn btn-success" value="Complete Checkout">
                </dl>

            </div>
        </div>
    </div>
    </form>

    <?php
}else{
    redirect('/', 'refresh');

}
?>
