<?php
require_once('./../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT  b.*,concat(c.lastname,', ', c.firstname,' ',c.middlename) as client from `booking_list` b inner join client_list c on b.client_id = c.id where b.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
        $qry2 = $conn->query("SELECT c.*, cc.name as category from `cab_list` c inner join category_list cc on c.category_id = cc.id where c.id = '{$cab_id}' ");
        if($qry2->num_rows > 0){
            foreach($qry2->fetch_assoc() as $k => $v){
                if(!isset($$k))
                $$k=$v;
            }
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none
    }
</style>
<div class="container-fluid">
    <fieldset class="border-bottom">
        <legend class="h5 text-muted"> Boda Details</legend>
        <dl>
            <dt class="">Boda Body No</dt>
            <dd class="pl-4"><?= isset($body_no) ? $body_no : "" ?></dd>
            <dt class="">Boda Category</dt>
            <dd class="pl-4"><?= isset($category) ? $category : "" ?></dd>
            <dt class="">Boda model</dt>
            <dd class="pl-4"><?= isset($cab_model) ? $cab_model : "" ?></dd>
            <dt class="">Rider</dt>
            <dd class="pl-4"><?= isset($cab_driver) ? $cab_driver : "" ?></dd>
            <dt class="">Rider Contact</dt>
            <dd class="pl-4"><?= isset($driver_contact) ? $driver_contact : "" ?></dd>
            <dt class="">Rider Address</dt>
            <dd class="pl-4"><?= isset($driver_address) ? $driver_address : "" ?></dd>
        </dl>
    </fieldset>
    <div class="clear-fix my-2"></div>
    <fieldset class="bor">
        <legend class="h5 text-muted"> Booking Details</legend>
        <dl>
            <dt class="">Ref. Code</dt>
            <dd class="pl-4"><?= isset($ref_code) ? $ref_code : "" ?></dd>
            <dt class="">Client</dt>
            <dd class="pl-4"><?= isset($client) ? $client : "" ?></dd>
            <dt class="">Pickup Zone</dt>
            <dd class="pl-4"><?= isset($pickup_zone) ? $pickup_zone : "" ?></dd>
            <dt class="">Drop off Zone</dt>
            <dd class="pl-4"><?= isset($drop_zone) ? $drop_zone : "" ?></dd>
            <dt class="">Status</dt>
            <dd class="pl-4">
                <?php 
                    switch($status){
                        case 0:
                            echo "<span class='badge badge-secondary bg-gradient-secondary px-3 rounded-pill'>Pending</span>";
                            break;
                        case 1:
                            echo "<span class='badge badge-primary bg-gradient-primary px-3 rounded-pill'>Driver Confirmed</span>";
                            break;
                        case 2:
                            echo "<span class='badge badge-warning bg-gradient-warning px-3 rounded-pill'>Picked-up</span>";
                            break;
                        case 3:
                            echo "<span class='badge badge-success bg-gradient-success px-3 rounded-pill'>Dropped off</span>";
                            break;
                        case 4:
                            echo "<span class='badge badge-danger bg-gradient-danger px-3 rounded-pill'>Cancelled</span>";
                            break;
                    }
                ?>
            </dd>
        </dl>
    </fieldset>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-dark btn-flat bg-gradient-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>