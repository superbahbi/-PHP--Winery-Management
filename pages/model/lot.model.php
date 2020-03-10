<?php
$alert = "";
$editmode = false;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
if($user['type'] > 1){
    if(isset($_GET['delete'])){
        $alert = $db->delete('product', $_GET['delete']);
    }
    if(isset($_GET['edit'])){
        $result = $db->get_all_data("product", "id=".$_GET['edit']);
        $updaterow = $result->fetch_assoc();
        $editmode = true;
        if (isset($_POST['submit'])){
            $alert = $db->update("product", $_POST, $_GET['edit']);
            $editmode = false;
        }
    } else if (isset($_POST['submit'])){
        $alert = $db->insert("product", $_POST);
    }
}
if(isset($_POST['searchbtn']) && ($_POST['search'])){
    $data = $_POST['search'];
    $result = $db->get_all_data("product", "code='".$data."'");
} else {
    if(isset($_GET['sort'])){
        $result = $db->get_all_data("product", null, $_GET['sort']);
    } else {
        $result = $db->get_all_data("product", null, "code");
    }
}
?>
