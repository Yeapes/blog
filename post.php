<?php include 'inc/header.php'; ?>
<?php
/* Take Id From the index file through GET variable */
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    header("Location:404.php");
} else {
    $id = $_GET['id'];
}
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <?php
            $query = "SELECT * FROM tbl_post WHERE id=$id";
            $post = $db->select($query);
            /* Start if Statements and while loop */
            if ($post) {
                while ($result = $post->fetch_assoc()) {
                    ?>
                    <h2><?php echo $result['title'] ?></h2>
                    <h4><?php echo $fm->dateFormat($result['date']); ?>, By <a><?php echo $result['author']; ?></a></h4>
                    <img src="admin/<?php echo $result['image']; ?> " alt="MyImage"/>
                    <?php echo $result['body']; ?>
                    <div class="relatedpost clear">
                        <h2>Related articles</h2>
                        <?php
                        $catid = $result['id'];
                        $queryrealted = "SELECT * FROM tbl_post WHERE cat='$catid' order by rand() limit 6";
                        $relatedpost = $db->select($queryrealted);
                        if ($relatedpost) {
                            while ($rresult = $relatedpost->fetch_assoc()) {
                                ?>
                                <a href="post.php?id=<?php echo $rresult['id']; ?>">	
                                    <img src="admin/<?php echo $rresult['image']; ?>" alt="post image"/>
                                </a>
                            <?php
                            }
                        } else {
                            echo "Realated Post No Found";
                        }
                        ?>
                    </div>
                <?php
                }
            } else {
                header("Location:404.php");
            }
            ?>	
        </div>
    </div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>