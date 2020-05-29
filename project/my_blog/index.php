<?php
  //include("./header1.php");
 // include_once("./header.php");

  ///require("./header.php");
  require_once("./header.php");
  require_once ('./functions.php');
    $where_condition = 'Where posts.status=1';
    $all_post = get_all_post($where_condition);
    //echo '<pre>';
    //print_r($all_post);
   // exit();

?>

<!-- Page Title Starts -->
    <div class="page-title page-title-blog text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>We Follow Fashion Trends</h2>
                    <p>For whom, who are in extremely love with eco friendly system.</p>
                    <a href="#" class="template-btn">view post details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->


    <!-- Start blog-posts Area -->
			<section class="blog-posts-area section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 post-list blog-post-list">
                                <?php if($all_post->num_rows > 0){?>
                                <?php  while($row=mysqli_fetch_assoc($all_post)){
                                    ?>

                                <div class="single-post">
                                    <a href="post_details.php?id=<?php echo base64_encode($row['id']); ?>">
                                        <img class="img-fluid" src="<?php echo $row['feature_image']?>" alt="">
                                    </a>
                                        <ul class="tags">
                                        <li><a href="#"><?php echo $row['first_name'].' '.$row['middle_name'].''.$row['last_name']; ?> </a></li>

                                    </ul>
                                    <a href="post_details.php?id=<?php echo base64_encode($row['id']); ?>">
                                        <h2>
                                            <?php echo $row['title']?>
                                        </h2>
                                    </a>
                                    <p>
                                        <?php echo $row['sort_description']?>
                                    </p>
                                    <div class="bottom-meta">
                                        <div class="user-details row align-items-center">
                                            <div class="comment-wrap col-lg-6">
                                                <ul>
                                                    <li><a href="#"><span class="lnr lnr-heart"></span>	4 likes</a></li>
                                                    <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php }} else{ ?>
                                <div>NO Data Found</div>
                                <?php } ?>
                            </div>
                            <?php include_once('right_sidebar.php');?>
                        </div>
                    </div>
                </section>
                <!-- End blog-posts Area -->

<?php
include_once("./footer.php");

?>
