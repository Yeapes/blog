<?php
include "inc/header.php";
?>
<?php
include "inc/sidebar.php";
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <?php
        if (isset($_GET['delcat'])) {
            $delid = $_GET['delcat'];
            $query = "DELETE FROM tbl_category WHERE id='$delid'";
            $delcat = $db->delete($query);
            if ($delcat) {
                echo "<span class='success'>Data Deleted Succesfully</span>";
            } else {
                echo "<span class='error'>Data Not Deleted</span>";
            }
        }
        ?>
        <div class="block"> 

            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tbl_category ORDER BY id desc";
                    $catlist = $db->select($query);
                    if ($catlist) {
                        $i = 0;
                        while ($category = $catlist->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $category['name']; ?></td>
                                <td><a href="editcat.php?catid=<?php echo $category['id']; ?>">Edit</a> || <a onclick="return confirm('Are You Sure to delete!');" href="?delcat=<?php echo $category['id']; ?>">Delete</a></td>
                            </tr>
                        <?php }
                    } ?>	
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include "inc/footer.php"; ?> 

