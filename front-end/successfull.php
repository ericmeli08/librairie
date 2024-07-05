
    <div  action="<?=URL_CONTROLLER2."delete_bookController.php" ?>" id="confirme-delete" >
        <div id="modal">
            <p>Are you sure you want to delete ?</p>
            <div>
                <a href="<?=URL_CONTROLLER2."delete_bookController.php?id=".$_GET['id']."&from=".$_GET['from']."" ?>"   class="btn"  id="okayButton">Yes</a>
                <a href="<?= $_SERVER['PHP_SELF']."?id=".$_GET['id'] ?>" id=" no-delete">No</a>
            </div>
        </div>
</div>
