<?php require('components/head.inc.php'); ?>
    <div class="wrapper">
        <!-- Left Side-->

        <?php include('components/dogimage.inc.php'); ?>  

        <!-- Right Side-->
        <div class="right ps-4">
            <div class="input-into">
                <a href="input.php"><button type="button" class="btn btn-light float-end me-4 mt-4">Input Dog</button></a>
            </div>
            <!-- SEARCH -->
                <!-- Search API -->
            <div class="text-center mt-5 pt-5">
                <div class="search-api border-bottom">
                    <h3>Search Dog Breeds</h3>
                    <div class="dog-slides mb-5">
                        <div>
                          <div>Select a dog breed</div>
                          <br>
                          <div id="breed"></div>
                          <br>
                        </div>
                        <div class="show-dogs" id="slideshow">
                  
                        </div>
                    </div>
                </div>
                
                <!-- Search MySQL Database -->
                <div class="search-data mt-5 mb-5">
                    <h3>Search Our Database</h3>
                    <p>Enter a breed of dog</p>
                    <form name="dogsearch" method="POST" action="../searchdog/dogcheck.php" enctype="multipart/form-data">
                        <input type="text" name="search" placeholder=" Ex. Boxer"><br>
                        <input type="submit" name="submit-search" value="Let's Look!" class="btn btn-primary mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require('components/footer.inc.php'); ?>
