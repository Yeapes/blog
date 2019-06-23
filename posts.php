<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
<!---Take Id From The Get Variable--->
<?php
if (!isset($_GET['category']) || $_GET['category'] == NULL) {
    header("Location:404.php");
} else {
    $id = $_GET['category'];
}
?>

<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        /* Read From The Database */
        $query = "SELECT * FROM tbl_post WHERE cat=$id ";

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

                    <a href="#"><img src="./admin/<?php echo $result['image']; ?>" alt="post image"/></a>

                    <!---This is maincontent of post Data collected from the database table-->

                    <?php echo $fm->textShorten($result['body']); ?>

                    <div class="readmore clear">

                        <!--- This is readmore option data collected from the database table-->
                        <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
                    </div>
                </div>
            <?php
            }
        } else {
            header("Location:404.php");
        }
        ?>	<!---End If Statements ---->
    </div>
    <!--- This block means  sidebar and footer part of this website--->
<?php include 'inc/sidebar.php'; ?> <!-- This is sidebar--->
<?php include 'inc/footer.php'; ?> <!--This is footer part--->
