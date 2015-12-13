<html>
    <head>
        <title>My PHP blog</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/post.css">
        <link rel="stylesheet" href="css/form.css">
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand">Welcome</div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active new_post" style="margin-left: 40px"><a href="#">New post</a></li>
                        <li><a href="#about">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="row" id="blogHeader">
                <div class="col-sm-12">
                    <h1 class="blog-title">My PHP Blog</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8" id="blogBody">
                    <?php
                    $posts = Storage::getInstance()->readData();
                    if (count($posts) != 0) {
                        foreach($posts as $post) {
                            include('../view/post.htm.php');
                        }
                    }
                    else echo '<h5>You don\'t have any posts yet</h5>';
                    ?>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>

        <?php include_once('../view/post_form.htm.php') ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>