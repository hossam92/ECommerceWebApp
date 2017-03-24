        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container-fluid">
                    <div class="col-sm-2">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/">Brand</a>
                        </div>    
                    </div>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div><!-- /btn-group -->
                            <input type="text" class="form-control navbar-btn" id="search_input" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default navbar-btn" id="search_btn" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                    <div class="col-sm-3">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                $auth = Zend_Auth::getInstance();
                                if ($auth->hasIdentity()) {
                                    $userName = $auth->getIdentity()->fullname;
                                    ?>
                                    <li>
                                        <p class="navbar-text navbar-right">Welcome<span style="font-weight: bold; font-size: 20px"> <?= $userName ?></span></p>
                                    </li>
                                    <li style="margin-left: 25px; margin-right: 20px"><div class="dropdown">
                                            <button class="btn btn-warning dropdown-toggle navbar-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="/signout">Sign Out</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                   <?php
                                } else {
                                    ?>
                                    <li><a class="btn navbar-btn btn-sm btn-warning" href="/login">Login</a></li>
                                    <li><a style="margin-left: 10px; margin-right: 15px" class="btn navbar-btn btn-sm btn-warning" href="/signup">Sign Up</a></li>
                                <?php } ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home <span class="sr-only">(current)</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Departments <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $categories = (new Application_Model_Category())->selectAll();
                                    foreach ($categories as $category) {
                                        ?>
                                        <li><a href="/products/display/cid/<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                                        <!--                                <li role="separator" class="divider"></li>-->
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">My Shopping Cart</a></li>
                            <li><a href="#">My Wish List</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
        </nav>
        <!--        <nav style="z-index: 2"class="navbar navbar-default navbar-fixed-top" id="second-nav">
                    <div class="container-fluid">
                         Collect the nav links, forms, and other content for toggling 
        
                    </div> /.container-fluid 
                </nav>-->

        <div class="container">
            <div id="search_result"></div>
            <?php echo $this->layout()->content; ?>  
            <div class="footer">
                <div class="wrap">
                    <div class="foot-links">
                        <ul>
                            <h3>Links</h3>
                            <li><a href="<?= $this->baseUrl() ?>">Home</a></li>
                            <li><a href="<?= $this->baseUrl() ?>/products">Products</a></li>
                            <li><a href="//w3layouts.com/contact" >Contact Us</a></li>
                        </ul>
                        <ul>
                            <h3>Others</h3>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <script type="text/javascript" src="<?= $this->baseUrl() ?>/assets/js/script.js"></script>