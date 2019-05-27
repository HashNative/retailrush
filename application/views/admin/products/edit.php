

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Products</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

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


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Product</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php echo base_url('products/update/'.$product_data['id']);?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label>Image Preview: </label>
                  <img src="<?php echo base_url() . $product_data['image'] ?>" width="150" height="150" class="img-circle">
                </div>

                <div class="form-group">

                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" autocomplete="off" value="<?php echo !empty($this->input->post('name')) ?:$product_data['name'] ?>" />
                </div>


                  <div class="form-row">
                      <div class="col-md-6 form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" autocomplete="off" value="<?php echo !empty($this->input->post('price')) ?:$product_data['price'] ?>"/>
                      </div>

                      <div class="col-md-6 form-group">
                          <label for="price">Cut Price</label>
                          <input type="text" class="form-control" id="cut_price" name="cut_price" placeholder="Enter cut price" autocomplete="off" value="<?php echo !empty($this->input->post('cut_price')) ?:$product_data['cut_price'] ?>"/>
                      </div>

                  </div> <!-- form-row end.// -->

                  <div class="form-row">
                      <div class="col-md-6 form-group">
                          <label for="price">Offer</label>
                          <input type="text" class="form-control" id="offer" name="offer" placeholder="Enter offer %" autocomplete="off" value="<?php echo !empty($this->input->post('offer')) ?:$product_data['offer'] ?>"/>
                      </div>

                  </div> <!-- form-row end.// -->

                  <div class="form-row">
                  <div class="col-md-12 form-group">
                      <label for="details">Details</label>
                      <textarea type="text" class="form-control" id="description" name="details" placeholder="Enter
                  details" autocomplete="off">
                  <?php echo !empty($this->input->post('details')) ?:$product_data['details'] ?>
                  </textarea>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col-md-12 form-group">
                  <label for="category">Category</label>
                  <?php $category_data = json_decode($product_data['category_id']); ?>
                  <select class="form-control select_group" id="category" name="category[]" multiple="multiple">
                    <?php foreach ($category as $k => $v): ?>
                      <option value="<?php echo $v['name'] ?>" <?php if(in_array($v['name'], $category_data)) { echo 'selected="selected"'; } ?>><?php echo $v['name']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                  </div>

                  <div class="form-row">
                  <div class="col-md-12 form-group">
                      <label for="price">Brand</label>
                      <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter brand" autocomplete="off" value="<?php echo !empty($this->input->post('brand')) ?:$product_data['brand'] ?>"/>
                  </div></div>
                  <div class="form-row">
                  <div class="col-md-12 form-group">
                      <label for="price">Quantity</label>
                      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" autocomplete="off" value="<?php echo !empty($this->input->post('quantity')) ?:$product_data['quantity'] ?>"/>
                  </div>
                  </div>

                  <div class="form-row">
                  <div class="col-md-12 form-group">
                  <label for="store">Featured</label>
                  <select class="form-control" id="featured" name="featured">
                    <option value="1" <?php if($product_data['featured'] == 1) { echo 'selected="selected"'; } ?>>Yes</option>
                    <option value="2" <?php if($product_data['featured'] == 2) { echo 'selected="selected"'; } ?>>No</option>
                  </select>
                </div>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#productMainNav").addClass('active');
    $("#createProductSubMenu").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>