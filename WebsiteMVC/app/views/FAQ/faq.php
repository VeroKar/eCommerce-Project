<?php require APPROOT . '/views/includes/header.php'; ?>

<html>

<head>
<meta charset="utf-8" />
</head>

<body>

    <!-- FAQs -->
    <div class= "container">
            <br><h2>FAQs</h2><br>
    </div>

<div class="container">
    <div class="accordion" id="accordionExample">

    <?php
    foreach($data["faqs"] as $faq){

        
    echo '<div class="accordion-item">';

        echo '<h2 class="accordion-header" id="heading'.$faq->FAQId.'">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$faq->FAQId.'" aria-expanded="false" aria-controls="collapse'.$faq->FAQId.'">
            '.$faq->FAQQuestion.'
        </button>
        </h2>';

        echo '
        <div id="collapse'.$faq->FAQId.'" class="accordion-collapse collapse" aria-labelledby="heading'.$faq->FAQId.'" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            '.$faq->FAQAnswer.'  
        </div>
        </div>';
        
    echo '</div>';

    }
    ?>
    
    </div>
</div>

</body>
</html>

<?php require APPROOT . '/views/includes/footer.php'; ?>