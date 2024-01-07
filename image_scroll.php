<div class="image_scroll">
    <div class="image_slide">
        <div class="oferta_info">
            <h5>Nazwa oferty_1<br>
                treść</h5>
        </div>
        <img src="images\example_1.jpg" alt="sample" class="scroll">
    </div>

    <div class="image_slide">
        <div class="oferta_info">
            <h5>Nazwa oferty_2<br>
                treść</h5>
        </div>
        <img src="images\example_2.jpg" alt="sample" class="scroll">
    </div>

    <div class="image_slide">
        <div class="oferta_info">
            <h5>Nazwa oferty_3<br>
                treść</h5>
        </div>
        <img src="images\example_3.jpg" alt="sample" class="scroll">
    </div>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
    let i;
    let slides = document.getElementsByClassName("image_slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}   

    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>