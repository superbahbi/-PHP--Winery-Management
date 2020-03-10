<?php  include 'model/'.$_GET['page'].'.model.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Vessels</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
                                        <label>Vessel Code</label>
                                        <input name="code" value="<?php echo $updaterow['code'] ?>"class="form-control">
                                    </div>
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input name="product" value="<?php echo $updaterow['product'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type" value="<?php echo $updaterow['type'] ?>" class="form-control">
                                    <option value="1">Barrel</option>
                                    <option value="2">Keg</option>
                                    <option value="3">Carboy</option>
                                    <option value="4">Bin</option>
                                    <option value="5">Tank</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <input name="amount" value="<?php echo $updaterow['amount'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Capacity</label>
                                    <input name="capacity" value="<?php echo $updaterow['capacity'] ?>" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <label>Toast</label>
                                    <input name="toast" value="<?php echo $updaterow['toast'] ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Cooper</label>
                                    <input name="cooper" value="<?php echo $updaterow['cooper'] ?>" class="form-control">
                                </div>
                                <button type="button" class="btn btn-default" onclick="window.history.back()">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary" value="Submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table borderless" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><a href="?sort=code">Vessel Code</a></th>
                                            <th><a href="?sort=product">Product Code</a></th>
                                            <th><a href="?sort=type">Type</a></th>
                                            <th><a href="?sort=capacity">Capacity</a></th>
                                            <th><a href="?sort=amount">Content</a></th>
                                            <th><a href="?sort=toast">Toast</a></th>
                                            <th><a href="?sort=cooper">Cooper</a></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                            echo '<tr class="odd gradeA">
                                                <td>'.$row["code"].'</td>
                                                <td>'.$row["product"].'</td>
                                                <td>';
                                                switch($row["type"]){
                                                    case 1:
                                                        echo "Barrel";
                                                        break;
                                                    case 2:
                                                        echo "Keg";
                                                        break;
                                                    case 3:
                                                        echo "Carboy";
                                                        break;
                                                    case 4:
                                                        echo "Bin";
                                                        break;
                                                    case 5:
                                                        echo "Tank";
                                                        break;
                                                    default:
                                                        echo "Error!";
                                                        break;
                                                    
                                                }
                                                echo '</td>';
                                                echo '<td>'.$row["capacity"].' gals</td>';
                                                echo '<td>'.$row["amount"].' gals</td>';
                                                echo '<td>'.$row["toast"].'</td>';
                                                echo '<td>'.$row["cooper"].'</td>';
                                                if($user['type'] > 1){
                                                    echo '<td class="center">
                                                    <a href=?edit='.$row["id"].'><i class="fa fa-pencil fa-fw"></i></a>
                                                    <a href=?delete='.$row["id"].'><i class="fa fa-trash fa-fw"></i></a>
                                                    </td>';
                                                }
                                            echo '</tr>';
                                                
                                            }
                                        } 
                                        
                                        ?>
                                    </tbody>
                                </table>
                                <?php if($user['type'] > 1): ?>
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addmodal">Add</button>
                                <?php endif; ?>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

<!-- Modal -->
<form method="post">
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodallabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmodallabel">Add new vessel</h4>
      </div>
      <div class="modal-body">
            
                <div class="form-group">
                    <label>Vessel Code</label>
                    <input name="code" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product Code</label>
                    <input name="product"class="form-control">
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control">
                        <option value="1">Barrel</option>
                        <option value="2">Keg</option>
                        <option value="3">Carboy</option>
                        <option value="4">Bin</option>
                        <option value="5">Tank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input name="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label>Capacity</label>
                    <input name="capacity" class="form-control">
                </div>
                <div class="form-group">
                    <label>Toast</label>
                    <input name="toast" class="form-control">
                </div>
                <div class="form-group">
                    <label>Cooper</label>
                    <input name="cooper" class="form-control">
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
 
