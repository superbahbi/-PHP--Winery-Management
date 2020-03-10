<?php  include 'model/'.$_GET['page'].'.model.php' ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo ucfirst($page) ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if($alert): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <div class="alert alert-<?php echo $alert[1]; ?> alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $alert[0] ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($editmode): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <div id="collapseOne" class="panel-collapse collapse in">
                                <form method="post">
                                <div class="form-group">
                                    <label>Warehouse</label>
                                    <input name="warehouse" value="<?php echo $updaterow['warehouse'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" value="<?php echo $updaterow['city'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <input name="state" value="<?php echo $updaterow['state'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input name="zip" value="<?php echo $updaterow['zip'] ?>" class="form-control">
                                </div>
                                        <button type="button" class="btn btn-default" onclick="window.history.back()">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary" value="Submit">Update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($editinvenmode): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <div id="collapseOne" class="panel-collapse collapse in">
                                <form method="post">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input name="sku" value="<?php echo $updaterow['sku'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input name="product_code" value="<?php echo $updaterow['product_code'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input name="brand" value="<?php echo $updaterow['brand'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input name="year" value="<?php echo $updaterow['year'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Varietal</label>
                                    <input name="varietal" value="<?php echo $updaterow['varietal'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Alc %</label>
                                    <input name="alc" value="<?php echo $updaterow['alc'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <select name="size" value="<?php echo $updaterow['size'] ?>" class="form-control">
                                        <option value="750">750ml</option>
                                        <option value="1500">1.5L</option>
                                        <option value="500">500ml</option>
                                    </select>
                                    </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input name="quantity" value="<?php echo $updaterow['quantity'] ?>"class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" value="<?php echo $updaterow['status'] ?>" class="form-control">
                                        <option value="0">Tax Paid</option>
                                        <option value="1">In Bond</option>
                                    </select>
                                </div>
                                        <button type="button" class="btn btn-default" onclick="window.history.back()">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary" value="Submit">Update</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- /.panel-heading -->
                    <?php if(!$location): ?>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table borderless" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><a href="?sort=warehouse">Location</a></th>
                                        <th><a href="?sort=city">City</a></th>
                                        <th><a href="?sort=state">State</a></th>
                                        <th><a href="?sort=zip">Zip Code</a></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                          echo '<tr onclick=location.href="?location='.$row['id'].'" style="cursor: pointer">';
                                            echo '<td>'.$row["warehouse"].'</td>';
                                            echo '<td>'.$row["city"].'</td>';
                                            echo '<td>'.$row["state"].'</td>';
                                            echo '<td>'.$row["zip"].'</td>';
                                            if($user['type'] > 1){
                                                echo '<td class="center">
                                                <a href=?edit='.$row["id"].'><i class="fa fa-pencil fa-fw"></i></a>
                                                <a href=?delete='.$row["id"].'><i class="fa fa-trash fa-fw"></i></a>
                                                </td>';
                                            }
                                        echo '</a></tr>';

                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php if($user['type'] > 1): ?>
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addmodal">Add</button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php else: ?>
                        <?php if($result->num_rows > 0): ?>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table borderless" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=sku"?>SKU</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=product_code"?>Product Code</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=product_code"?>Product Code</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=brand"?>Brand</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=year"?>Year</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=varietal"?>Varietal</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=alc"?>Alc %</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=size"?>Size</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=quantity"?>Quantity</a></th>
                                            <th><a href="inventory?location=<?php echo $location ?>&sort=status"?>Status</a></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                  echo '<tr onclick=location.href="?location='.$row['location'].'" style="cursor: pointer">';
                                                    echo '<td>'.$row["sku"].'</td>';
                                                    echo '<td>'.$row["product_code"].'</td>';
                                                    echo '<td>'.$row["brand"].'</td>';
                                                    echo '<td>'.$row["year"].'</td>';
                                                    echo '<td>'.$row["varietal"].'</td>';
                                                    echo '<td>'.$row["alc"].'</td>';
                                                    echo '<td>'.$row["size"].'</td>';
                                                    echo '<td>'.$row["quantity"].'</td>';
                                                    if($row["status"] > 0){
                                                        echo '<td>Tax Paid</td>';
                                                    } else {
                                                        echo  '<td>In Bond</td>';
                                                    }
                                                    if($user['type'] > 1){
                                                        echo '<td class="center">
                                                        <a href=?location='.$location.'&edit='.$row["id"].'><i class="fa fa-pencil fa-fw"></i></a>
                                                        <a onclick="location.href = /" href=?location='.$location.'&delete='.$row["id"].'><i class="fa fa-trash fa-fw"></i></a>
                                                        </td>';
                                                    }
                                                echo '</a></tr>';
                
                                                }
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php else: ?>
                        No Result
                        <?php endif; ?>
                        <?php if($user['type'] > 1): ?>
                                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addinventorymodal">Add</button>
                                <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<!-- Modal -->
<form method="post">
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodallabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmodallabel">Add new location</h4>
      </div>
      <div class="modal-body">

                <div class="form-group">
                    <label>Warehouse</label>
                    <input name="warehouse" class="form-control">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input name="city"class="form-control">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input name="state" class="form-control">
                </div>
                <div class="form-group">
                    <label>Zip code</label>
                    <input name="zip" class="form-control">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary" value="Submit">Add</button>
      </div>
    </div>
  </div>
  </form>
</div>

<form method="post">
<div class="modal fade" id="addinventorymodal" tabindex="-1" role="dialog" aria-labelledby="addmodallabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmodallabel">Add new product</h4>
      </div>
      <div class="modal-body">

                <div class="form-group">
                    <label>Location</label>
                    <select name="location" class="form-control">
                        <option value="1">In Vino Veritas</option>
                        <option value="2">Safe Haven</option>
                        <option value="3">Lompoc</option>
                        <option value="4">Home</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>SKU</label>
                    <input name="sku"class="form-control">
                </div>
                <div class="form-group">
                    <label>Product Code</label>
                    <input name="product_code" class="form-control">
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input name="brand" class="form-control">
                </div>
                <div class="form-group">
                    <label>Year</label>
                    <input name="year" class="form-control">
                </div>
                <div class="form-group">
                    <label>Varietal</label>
                    <input name="varietal" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alc %</label>
                    <input name="alc" class="form-control">
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <select name="size" class="form-control">
                        <option value="750">750ml</option>
                        <option value="1500">1.5L</option>
                        <option value="500">500ml</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input name="quantity" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="0">Tax Paid</option>
                        <option value="1">In Bond</option>
                    </select>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary" value="Submit">Add</button>
      </div>
    </div>
  </div>
  </form>
</div>
 