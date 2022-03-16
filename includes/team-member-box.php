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

        // $profile = "Hey hallo
        // wie geht es dir

        // mann ok";
    ?>

        <div class="col-md-4 gy-3 gx-4 ">
            <div class="member-box shadow" onclick='
                showModal(
                    " <?php echo $name ?>", 
                    <?php echo json_encode($profile) ?>, 
                    "<?php echo $thumbnail ?>"
                );'>

                <div class="member-img-box">
                    <img src="<?php echo $thumbnail ?>" class="member-img rounded-circle shadow-sm" alt="">
                </div>

                <div class="member-name-box">
                    <h4 class="member-name"><?php echo $name ?></h4>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

</div>

<script>
    function showModal(name, profile, image) {
        jQuery(' #name').html(name);
        jQuery('#profile').html(profile);
        jQuery('#thumbnail').attr("src", image);
        jQuery('#myModal').modal('show');
    }

    function closeModal() {
        jQuery('#myModal').modal('hide');
    }
</script>

<!--  -->
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="member-img-box">
                    <img id="thumbnail" class="member-img rounded-circle shadow-sm">
                </div>
                <h4 class="modal-title member-name" id="name">Name</h4>
                <p id="profile">Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="closeModal()">Schliessen</button>
            </div>
        </div>
    </div>
</div>