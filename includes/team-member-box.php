<style>
    a:link {
        text-decoration: none;
    }

    .member-box {
        /* width: 200px;
        height: 200px; */
        /* background-color: red; */
        position: relative;
        /* border: solid 1px #000000; */
        padding-top: 40px;
        padding-bottom: 50px;
        transition: 0.3s;
    }

    .member-box:hover {
        transform: scale(1.03);
    }

    .member-name-box {
        width: 100%;
        padding: 0 30px;
        /* background-color: aquamarine; */
    }

    .member-name {
        font-size: 2.5rem;
        color: black;
        text-align: center;
        margin: 0 !important;
    }

    .member-img-box {}

    .member-img {
        object-fit: cover;
        padding: 10px;
        border-radius: 100%;
        margin: auto;
        width: 200px;
        height: 200px;
    }
</style>


<div class="row">

    <?php

    foreach ($posts as $post) {
        // var_dump($post);
        $name = $post->post_title;
        $profile = $post->post_content;
        $thumbnail =
            wp_get_attachment_image_src(
                get_post_thumbnail_id($post->ID),
                'single-post-thumbnail'
            )[0]
            ?? null;
    ?>

        <div class="col-md-4 gy-3 gx-4 ">
            <div class="member-box shadow">
                <a href="">
                    <div class="member-img-box">
                        <img src="<?php echo $thumbnail ?>" class="member-img" alt="">
                    </div>

                    <div class="member-name-box">
                        <h4 class="member-name"><?php echo $name ?></h4>
                    </div>
                </a>
            </div>
        </div>

    <?php
    }
    ?>

</div>