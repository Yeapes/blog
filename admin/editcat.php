<?php
include "inc/header.php";
?>
<?php
include "inc/sidebar.php";
?>
<?php
if (!$_GET['catid'] || $_GET['catid'] == NULL) {
    echo "<script>window.location = 'catlist.php';</script>";
    /*
     * alternative way header("Location:catlist.php");
     */
} else {
    $id = $_GET['catid'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock"> 
            <?php
            /* Check the request method */
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $name = mysqli_real_escape_string($db->link, $name);
                if (empty($name)) {
                    echo "<span class='error'>Field Must Not Be empty!</span>";
                } else {
                    $query = "UPDATE tbl_category
                       SET 
                       name ='$name'
                       WHERE id='$id'";
                    $updaterow = $db->update($query);
                    if ($updaterow) {
                        echo "<span class='success'>Category Updated  Succesfully</span>";
                    } else {
                        echo "<span class='error'>Category Not Updated</span>";
                    }
                }
            }
            ?>
            <?php
            $query = "SELECT * FROM tbl_category WHERE id='$id' ORDER BY id desc";
            $category = $db->select($query);
            if ($category) {
                while ($catresult = $category->fetch_assoc()) {
                    ?>
                    <form action="addcat.php" method="post">
                        <table class="form">	
                            <tr>
                                <td>
                                    <input type="text" name="name" value="<?php echo $catresult['name']; ?>" class="medium" />
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php }
            } ?>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>   