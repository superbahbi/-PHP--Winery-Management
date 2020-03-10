<?php
    $alert = "";
    $editmode = false;
    $page = $_GET['page'];
    if($user['type'] > 1){
        if(isset($_GET['delete'])){
            $alert = $db->delete('vessel', $_GET['delete']);
        } else if(isset($_GET['edit'])){
            $result = $db->get_all_data("vessel", "id=".$_GET['edit']);
            $updaterow = $result->fetch_assoc();
            $editmode = true;
            if (isset($_POST['submit'])){
                $alert = $db->update("vessel", $_POST, $_GET['edit']);
                $editmode = false;
            }
        } else if (isset($_POST['submit'])){
            $alert = $db->insert("vessel", $_POST);
        }
    }
    if(isset($_GET['sort'])){
        $result = $db->get_all_data("vessel", null, $_GET['sort'], 25);
    } else {
        $result = $db->get_all_data("vessel", null, "code", 25, 1);
    }
    ?>