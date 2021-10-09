<div class="container-fluid">

    <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
        <a class="navbar-brand" href="#">
            <h4><b>List categories</b></h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            while ($rowCtg =  mysqli_fetch_array($resultCtg)) {
            ?>
                <ul class="navbar-nav  list-ctg">

                    <li class="nav-item active">
                        <a class="nav-link" style="width: 10    rem;" href="index.php?view=ctg&idc=<?= $rowCtg["ctg_id"] ?>">
                            <div class="card">
                                <?php
                                if ($resultCtg->num_rows > 0) {
                                    $imageURL = '../admin/image_categories/' . $rowCtg["ctg_image"];
                                ?>
                                    <img class="my-1 mx-auto" src="<?php echo $imageURL; ?>" alt="" height="90" width="90" style="border-radius:10px" />
                                <?php
                                } else { ?>
                                    <p>No image(s) found...</p>

                                <?php } ?>

                                <div class="card-body">
                                    <p class="card-text"> <?= $rowCtg["ctg_name"] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            <?php
            }
            ?>
        </div>
    </nav>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var $lis = $('.change-color-card-ctg').on("click", function() {
        $lis.removeClass('card-change');
        $(this).addClass('card-change');
    });
    $(document).ready(function() {
        var $item = $('div.item-categories'), //Cache your DOM selector
            visible = 4, //Set the number of items that will be visible
            index = 0, //Starting index
            endIndex = ($item.length / visible) - 1; //End index

        $('div#arrowR').click(function() {
            debugger;

            if (index < endIndex) {
                index++;
                $item.animate({
                    'left': '-=600px'
                });
            }
        });

        $('div#arrowL').click(function() {
            if (index > 0) {
                index--;
                $item.animate({
                    'left': '+=600px'
                });
            }
        });

    });
</script>