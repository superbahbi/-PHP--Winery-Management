<?php

$alert = "";
$location = "";
if(isset($_GET['location'])){
    $location = $_GET['location'];
}
$editmode = $editinvenmode = false;
if(isset($_GET['page'])){
        $page = $_GET['page'];
}

// if user is admin and location doesn't exist
if(!$location){
    if($user['type'] > 1){
        if(isset($_GET['delete'])){
            $alert = $db->delete('location', $_GET['delete']);
        } else if(isset($_GET['edit'])){
            $result = $db->get_all_data("location", "id=".$_GET['edit']);
            $updaterow = $result->fetch_assoc();
            $editmode = true;
            if (isset($_POST['submit'])){
                $alert = $db->update("location", $_POST, $_GET['edit']);
                $editmode = false;
            }
        } else if (isset($_POST['submit'])){
            $alert = $db->insert("location", $_POST);
        }
    }
    // Get all location data for mysql
    if(isset($_GET['sort'])){
        $result = $db->get_all_data("location", null, $_GET['sort'], 25);
    } else {
        $result = $db->get_all_data("location", null, "warehouse", 25, 1);
    }
} else {
    if($user['type'] > 1){
        if(isset($_GET['delete'])){
            $db->delete('inventory', $_GET['delete']);
            redirect("/inventory?location=".$location);
            
        } else if(isset($_GET['edit'])){
            $result = $db->get_all_data("inventory", "id=".$_GET['edit']);
            $updaterow = $result->fetch_assoc();
            $editinvenmode = true;
            if (isset($_POST['submit'])){
                $alert = $db->update("inventory", $_POST, $_GET['edit']);
                $editinvenmode = false;
                redirect("/inventory?location=".$location);
            }
        } else if(isset($_POST['submit'])){
            $alert = $db->insert("inventory", $_POST);
        }
    } 
    //if location exist
    if(isset($_GET['sort'])){
        $result = $db->get_all_data("inventory", "location=".$location, $_GET['sort'], 25);
    } else {
        $result = $db->get_all_data("inventory", "location=".$location, "product_code", 25, 1);
    }
}
?>