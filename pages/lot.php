<?php  include 'model/'.$_GET['page'].'.model.php' ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
                <h1 class="page-header"><?php echo ucfirst($page) ?></h1>
        </div>
        <div class="col-lg-2">
            <form method='POST'>
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <span class="input-group-btn">
                    <button type="submit" name="searchbtn" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php if($alert): ?>
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <div class="alert alert-<?php echo $alert[1]; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $alert[0]; ?>
                    </div>
                </div>
            </div> 
            <?php endif; ?>
            <?php if($editmode): ?>
            <div id="collapseOne" class="panel-collapse collapse in">
                <form method="post">
                    <div class="form-group">
                        <label>Product Code</label>
                        <input name="code" value="<?php echo $updaterow['code'] ?>"class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Vintage</label>
                        <input name="vintage" value="<?php echo $updaterow['vintage'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Varietal</label>
                        <input name="varietal" value="<?php echo $updaterow['varietal'] ?>" class="form-control">
                    </div>
                        <div class="form-group">
                        <label>Vineyard</label>
                        <input name="vineyard" value="<?php echo $updaterow['vineyard'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Clone</label>
                        <input name="clone" value="<?php echo $updaterow['clone'] ?>" class="form-control">
                    </div>
                    </div>
                        <div class="form-group">
                        <label>Appelation</label>
                        <input name="appelation" value="<?php echo $updaterow['appelation'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Selects</label>
                        <select name="stage" value="<?php echo $updaterow['stage'] ?>" class="form-control">
                            <option value="1">Process</option>
                            <option value="2">Fermentation</option>
                            <option value="3">ML Fermentation</option>
                            <option value="4">Press</option>
                            <option value="5">Aging</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input name="content" value="<?php echo $updaterow['content'] ?>" class="form-control">
                    </div>
                        <button type="button" class="btn btn-default" onclick="window.history.back()">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" value="Submit">Update</button>
                    </div>
                </form>
                </div>
            <?php endif;?>
        </div>
    </div>
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-borderless table-condensed table-hover">
                <thead>
                    <tr>
                        <th><a href="?sort=code">Product Code</a></th>
                        <th><a href="?sort=vintage">Vintage</a></th>
                        <th><a href="?sort=varietal">Varietal</a></th>
                        <th><a href="?sort=clone">Clone</a></th>
                        <th><a href="?sort=vineyard">Vineyard</a></th>
                        <th><a href="?sort=appelation">Appelation</a></th>
                        <th><a href="?sort=stage">Stage</a></th>
                        <th><a href="?sort=content">Content</a></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<tr onclick=location.href="product?code='.$row["code"].'" style="cursor: pointer">
                            <td>'.$row["code"].'</td>
                            <td>'.$row["vintage"].'</td>
                            <td>'.$row["varietal"].'</td>
                            <td>'.$row["clone"].'</td>
                            <td>'.$row["vineyard"].'</td>
                            <td>'.$row["appelation"].'</td>
                            <td>';
                            switch($row["stage"]){
                                case 1:
                                    echo "Process";
                                    break;
                                case 2:
                                    echo "Fermentation";
                                    break;
                                case 3:
                                    echo "ML Fermentation";
                                    break;
                                case 4:
                                    echo "Press";
                                    break;
                                case 5:
                                    echo "Aging";
                                    break;
                                default:
                                    echo "Error!";
                                    break;

                            }
                            echo '</td>
                            <td>'.$row["content"].' tons</td>';
                            echo '<td class="center">';
                            if($user['type'] > 1){
                                echo '<a href=?edit='.$row["id"].'><i class="fa fa-pencil fa-fw"></i></a>';
                                echo '<a href=?delete='.$row["id"].'><i class="fa fa-trash fa-fw"></i></a>';
                            }
                            echo '</td>';
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
    </div>                  
</div>
<!-- Modal -->
<form method="post">
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodallabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addmodallabel">Add new product</h4>
      </div>
      <div class="modal-body">

                <div class="form-group">
                    <label>Product Code</label>
                    <input name="code" class="form-control">
                </div>
                <div class="form-group">
                    <label>Vintage</label>
                    <input name="vintage"class="form-control">
                </div>
                <div class="form-group">
                    <label>Varietal</label>
                    <input name="varietal"class="form-control">
                </div>
                <div class="form-group">
                    <label>Vineyard</label>
                    <input name="vineyard"class="form-control">
                </div>
                <div class="form-group">
                    <label>Clone</label>
                    <input name="clone"class="form-control">
                </div>
                <div class="form-group">
                    <label>Appelation</label>
                    <input name="appelation"class="form-control">
                </div>
                <div class="form-group">
                    <label>Selects</label>
                    <select name="stage" class="form-control">
                        <option value="1">Process</option>
                        <option value="2">Fermentation</option>
                        <option value="3">ML Fermentation</option>
                        <option value="4">Press</option>
                        <option value="5">Aging</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <input name="content" class="form-control">
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
