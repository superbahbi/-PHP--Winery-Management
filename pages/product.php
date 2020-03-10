<?php  include 'model/'.$_GET['page'].'.model.php' ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $result['vintage'] . ' ' . $result['varietal'] . ' ' . $result['vineyard'] . ' <small>' . $result['code']; ?></small></h1>
                    <span style="padding-right:3em"><b>Stage:</b>
                    <?php switch($result["stage"]){
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
                    ?></span>
                    <span style="padding-right:1em"><b>Contents: </b><?php echo $tons ?></span>
                    <span style="padding-right:1em"><?php echo $gallons ?></span>
                    <span style="padding-right:1em"><?php echo $liters ?></span>
                    <span style="padding-right:1em"><?php echo $hectoliters ?></span>
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
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="panel-heading">
                                    <h3>Fermentation</h3>
                                    </div>
                                    <table class="table table-borderless table-condensed table-hover">
                                        <tr>
                                            <th>Yeast </th>
                                            <td><?php echo $yeast ?></td>
                                        </tr>
                                        <tr>
                                            <th>Go-Ferm </th>
                                            <td><?php echo $goferm ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fermaid K </th>
                                            <td><?php echo $fermaidK ?></td>
                                        </tr>
                                        <tr>
                                            <th>DAP </th>
                                            <td><?php echo $DAP ?></td>
                                        </tr>
                                        <tr>
                                            <th>Oak </th>
                                            <td><?php echo $oak?></td>
                                        </tr>
                                        <tr>
                                            <th>Tartaric </th>
                                            <td><?php echo $tartaric ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-3">
                                    <div class="panel-heading ">
                                    <h3>Juice Analysis</h3>
                                    </div>
                                    <table class="table table-borderless table-condensed table-hover">
                                        <tr>
                                            <th>Brix ° </th>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>pH </th>
                                            <td>
                                                <form method='GET' action="index.php?page=<?php echo $page ?>&code=<?php echo $productcode?>">
                                                    <span id='theForm'></span>
                                                    <input id='theButton' type='button' name='ph' value='Add'>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TA g tar/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>VA g aa/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Malic g/L </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>L-Lactic g/L </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>GF g/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>NH3 ppm </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>AA ppm </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>YAN ppm </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Tartaric g/L </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>K ppm </th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-3">
                                    <div class="panel-heading ">
                                    <h3>Wine Analysis</h3>
                                    </div>
                                    <table class="table table-borderless table-condensed table-hover">
                                        <tr>
                                            <th>Ethanol %v/v </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>VA g aa/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>pH </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>TA g tar/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Malic g/L </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>L-Lactic g/L </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>GF g/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>RS g/100mL </th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Density g/mL </th>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

<script>
    jQuery(function($) {

    $('#theButton').click(addAnotherTextBox);

    function addAnotherTextBox() {
        var $input = $( this );
        $("#theForm").append("<input size='10' type='text' name='" + $input.attr("name") + "' >");
        $("#theForm").append("<input type='submit' value='Add'>");
        $( "#theButton" ).remove();
    }

});
</script>
