<!-- Carousel
    ================================================== -->
<div id = "myCarousel" class = "carousel slide" data-ride = "carousel">
    <!-- Indicators -->
    <ol class = "carousel-indicators">
        <li data-target = "#myCarousel" data-slide-to = "0" class = "active"></li>
        <li data-target = "#myCarousel" data-slide-to = "1"></li>
        <li data-target = "#myCarousel" data-slide-to = "2"></li>
    </ol>
    <div class = "carousel-inner" role = "listbox">
        <div class = "item active">
            <img class = "first-slide" src = "/files/images/c1.jpg" alt = "First slide">

            <div class = "container">
                <div class = "carousel-caption">
                    <h1>Професіонали</h1>

                    <p>Вам потрібна кваліфікована команда
                        <code>професіоналів</code>? Зверніться до нас!
                    </p>
                </div>
            </div>
        </div>
        <div class = "item">
            <img class = "second-slide" src = "/files/images/c2.jpg" alt = "Second slide">

            <div class = "container">
                <div class = "carousel-caption">
                    <h1>Екстер'єр</h1>

                    <p>
                        Ваша споруда матиме сучасний європейський вид!
                    </p>

                    <p>
                        <a
                            class = "btn btn-lg btn-primary"
                            href = "/categories/2/items"
                            role = "button"
                            >
                            {{ trans( 'buttons.view' ) }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class = "item">
            <img class = "third-slide" src = "/files/images/c3.jpg" alt = "Third slide">

            <div class = "container">
                <div class = "carousel-caption">
                    <h1>Інтер'єр</h1>

                    <p>
                        Внутрішні роботи професійного рівня!
                    </p>

                    <p>
                        <a
                            class = "btn btn-lg btn-primary"
                            href = "/categories/3/items"
                            role = "button"
                            >
                            {{ trans( 'buttons.view' ) }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class = "left carousel-control" href = "#myCarousel" role = "button"
       data-slide = "prev">
        <span class = "glyphicon glyphicon-chevron-left"
              aria-hidden = "true"></span>
        <span class = "sr-only">Previous</span>
    </a>
    <a class = "right carousel-control" href = "#myCarousel" role = "button"
       data-slide = "next">
        <span class = "glyphicon glyphicon-chevron-right"
              aria-hidden = "true"></span>
        <span class = "sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
