<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <!--pagination--->
        <?php
        $per_page = 3;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $start_form = ($page - 1) * $per_page;
        ?>
        <!---pagination--->
        <?php
        /* Read From The Database */
        $query = "SELECT * FROM tbl_post limit $start_form, $per_page";
        $post = $db->select($query);
        if ($post) {
            while ($result = $post->fetch_assoc()) {
                ?>
                <div class="samepost clear">
                    <!-- This is title part of this website Data Read from the Database--->
                    <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
                    <!---This block mean post date and time the athor name who actually post-->
                    <h4><?php echo $fm->dateFormat($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
                    <!---This is post image data collected from the database-->
                    <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
                    <!---This is maincontent of post Data collected from the database table-->
                    <?php echo $fm->textShorten($result['body']); ?>
                    <div class="readmore clear">
                        <!--- This is readmore option data collected from the database table-->
                        <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
                    </div>
                </div>
            <?php } ?> 
            <!--- End Of While Condition---->
            <!---Pagination--->
            <?php
            $query = "SELECT * FROM tbl_post";
            $result = $db->select($query);
            $total_rows = mysqli_num_rows($result);
            $total_pages = ceil($total_rows / $per_page);

            echo "<span class='pagination'><a href='index.php?page=1'>" . 'First Page' . "</a>";
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
            }
            echo "<a href='index.php?page=$total_pages'>" . 'Last Page' . "</a></span>"
            ?>	
            <!---Pagination--->
        <?php
        } else {
            header("Location:404.php");
        }
        ?>	
        <!---End If Statements ---->
    </div>
    <!--- This block means  sidebar and footer part of this website--->
    <!-- This is sidebar--->
<?php include 'inc/sidebar.php'; ?> 
    <!--This is footer part--->
<?php include 'inc/footer.php'; ?> 