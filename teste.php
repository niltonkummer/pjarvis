<!DOCTYPE HTML>
<html>
<head>

    <title>Image Zoom With jQuery</title>
    <style type="text/css">
        #view {
            border: 1px solid #333333 ;
            overflow: hidden ;
            position: relative ;
            width: 400px ;
        }
        #image {
            display: block ;
            left: 0px ;
            top: 0px ;
        }
    </style>
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.backstretch.min.js"></script>
    <script src="bootstrap/js/login.js"></script>
    <style>
        body {
            font-family: "Raleway", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

    </style>
    <script type="text/javascript">
        // When the WINDOW is ready, initialize. We are going with
        // the window load rather than the document so that we
        // know our image will be ready as well (complete with
        // gettable dimentions).




        $( window ).load(function(){
            var partes = [
                {titulo: "Quarto", width: 165, height: 173, top: 105, left: 80}, // quarto
                {titulo: "Sala", width: 131, height: 117, top: 105, left: 251}, // sala
                {titulo: "Quarto 2",width: 212, height: 173, top: 105, left: 388}, // quarto 2
                {titulo: "Garagem",width: 212, height: 287, top: 286, left: 388}, // garagem
                {titulo: "Sala",width: 306, height: 146, top: 425, left: 80}, // sala
                {titulo: "Cozinha",width: 306, height: 133, top: 285, left: 80} // cozinha
            ]

            var isZoom = false;
            var view = $( "#view" );
            var image = $( "#image" );
            var title = $( "#title" );

            view.width(image.width());
            view.height(image.height());
            image.css("position", "absolute");
            image.height(image.height());

            for (parte in partes) {

                var zoomPart = $("<div ><span><br /></span></div>");

                zoomPart.width(partes[parte].width);
                zoomPart.height(partes[parte].height);
                zoomPart.css("top", partes[parte].top);
                zoomPart.css("left", partes[parte].left);
                zoomPart.data(
                    {title: partes[parte].titulo}
                )
                // zoomRoom.css("border", "1px solid #000");
                thisZoom = zoomPart
                zoomPart.hover(function (event) {
                    $(event.currentTarget).css("background-color", "#CCC");
                    $(event.currentTarget).css("opacity", ".6");
                }, function () {
                    $(event.currentTarget).css("background-color", "none");
                    $(event.currentTarget).css("opacity", "0");
                });

                zoomPart.css("cursor", "pointer");
                zoomPart.css("z-index", "10000");
                zoomPart.css("position", "absolute");

                zoomPart.click(
                    function (event) {


                        image.data({
                            zoomFactor: (view.width() / $(event.currentTarget).width()),

                        });

                        // First, prevent the default since this is
                        // not a navigational link.
                        //event.preventDefault();
                        if (isZoom) {
                            isZoom = false;
                            title.text("");
                            resetZoom();
                        } else {
                            isZoom = true;

                            title.text($(event.currentTarget).data().title);
                            // Let's pass the position of the zoom box
                            // off to the function that is responsible
                            // for zooming the image.
                            zoomImage(
                                $(event.currentTarget).position().left,
                                $(event.currentTarget).position().top
                            );
                        }
                    }
                );

                // Now, add the zoom square to the view.
                view.append(zoomPart);
            }

            image.data({
                zoomFactor: (view.width() / $(event.currentTarget).width()),
                zoom: 1,
                top: 0,
                left: 0,
                width: image.width(),
                height: image.height(),
                originalWidth: image.width(),
                originalHeight: image.height()
            });

            var zoomImage = function( zoomLeft, zoomTop ){
                var imageData = image.data();

                if ((imageData.zoom == 5) || (image.is( ":animated" ))){
                    return;
                }

                imageData.width = (image.width() * imageData.zoomFactor);
                imageData.height = (image.height() * imageData.zoomFactor);
                // Change the offset set data to re-position the
                // 0,0 coordinate back up in the top left.
                imageData.left = ((imageData.left - zoomLeft) * imageData.zoomFactor);
                imageData.top = ((imageData.top - zoomTop) * imageData.zoomFactor);
                // Increase the zoom.
                imageData.zoom++;
                // Animate the zoom.
                image.animate(
                    {
                        width: imageData.width,
                        height: imageData.height,
                        left: imageData.left,
                        top: imageData.top
                    },
                    200
                );
            };
            // I reset the image zoom.
            var resetZoom = function(){

                var imageData = image.data();
                imageData.zoom = 1;
                imageData.top = 0;
                imageData.left = 0;
                imageData.width = imageData.originalWidth;
                imageData.height = imageData.originalHeight;
                image.animate(
                    {
                        width: imageData.width,
                        height: imageData.height,
                        left: imageData.left,
                        top: imageData.top
                    },
                    200
                );
            };

            $( document ).mousedown(
                function( event ){
                    // Check to see if the view is in the event
                    // bubble chain for the mouse down. If it is,
                    // then this click was in the view or its
                    // child elements.
                    var closestView = $( event.target ).closest( "#view" );
                    // Check to see if this mouse down was in the
                    // image view.
                    if (!closestView.size()){
                        // The view was not found in the chain.
                        // This was clicked outside of the view.
                        // Reset the image zoom.
                        resetZoom();
                    }
                }
            );
        });
    </script>
</head>
<body>
<div style="width: 680px;">
    <div style="position: absolute; width: 680px; z-index: 1000; background-color: #1c94c4;">
        <h1 id="title" style="text-align: center"></h1>
    </div>

    <div id="view">
        <img id="image" src="./planta.jpg" width="680" />

    </div>
    </div>
</body>
</html>