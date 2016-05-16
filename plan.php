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
    <!--
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    -->
    <meta name="viewport" content="initial-scale=.5, maximum-scale=1">

    <script src="js/jquery-1.10.1.min.js"></script>

    <script src="js/jquery.mobile.custom.js"></script>
    <link rel="stylesheet" href="js/jquery.mobile.custom.structure.css" />
    <link rel="stylesheet" href="js/jquery.mobile.custom.theme.css" />
    <style>
        body {
            font-family: "Raleway", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

    </style>
    <script type="text/javascript">
        $( window ).load(function(){
            var partes = [
                {pino: 0, titulo: "Quarto",   width: 165, height: 173, top: 105, left: 80,  image: "quarto-hd.jpg",   items:["lampada","ventilador"]}, // quarto
                {pino: 1, titulo: "Banheiro", width: 131, height: 117, top: 105, left: 251, image: "banheiro-hd.jpg", items:["lampada"]}, // sala
                {pino: 2, titulo: "Quarto 2", width: 212, height: 173, top: 105, left: 388, image: "quarto2-hd.jpg",  items:["lampada"]}, // quarto 2
                {pino: 4, titulo: "Garagem",  width: 212, height: 287, top: 286, left: 388, image: "garagem.jpg"}, // garagem
                {pino: 5, titulo: "Sala",     width: 306, height: 146, top: 425, left: 80,  image: "sala.jpg"}, // sala
                {pino: 6, titulo: "Cozinha",  width: 306, height: 133, top: 285, left: 80,  image: "cozinha.jpg", items:["lampada"]} // cozinha
            ];

            var isZoom = false;
            var view = $( "#view" );
            var image = $( "#image" );
            var title = $( "#title" );

            view.width(image.width());
            view.height(image.height());
            image.css("position", "absolute");
            image.height(image.height());

            var bgReset = $("<div id='bg-reset'>");
            bgReset.hide();
            bgReset.css("position","absolute");
            bgReset.css("width", "100%");
            bgReset.css("height", "100%");
            bgReset.css("z-index", "200")
            bgReset.click(function(){
                isZoom = false;
                title.text("");
                resetZoom();
            });
            view.append(bgReset);
            for (parte in partes) {

                var zoomPart = $("<div class='zoomPart'><span><br /></span></div>");

                zoomPart.width(partes[parte].width);
                zoomPart.height(partes[parte].height);
                zoomPart.css("top", partes[parte].top);
                zoomPart.css("left", partes[parte].left);
                zoomPart.data(
                    {
                        title: partes[parte].titulo,
                        items: partes[parte].items,
                        image: partes[parte].image,
                        pino: partes[parte].pino
                    }
                );
                console.log(zoomPart.data());
                // zoomRoom.css("border", "1px solid #000");
                thisZoom = zoomPart
                zoomPart.hover(function (event) {
                    $(event.currentTarget).css("background-color", "#CCC");
                    $(event.currentTarget).css("opacity", ".3");
                }, function () {
                    $(event.currentTarget).css("background-color", "none");
                    $(event.currentTarget).css("opacity", "0");
                });

                zoomPart.css("cursor", "pointer");
                zoomPart.css("z-index", "100");
                zoomPart.css("position", "absolute");

                zoomPart.click(
                    function (event) {
                        image.data({
                            zoomFactor: (view.width() / $(event.currentTarget).width()),
                        });
                        var items = $(event.currentTarget).data();
                        // First, prevent the default since this is
                        // not a navigational link.
                        event.preventDefault();
                        if (isZoom) {
                            isZoom = false;
                            title.text("");
                            resetZoom();
                        } else {

                            bgReset.show();
                            isZoom = true;
                            var bgImage = $("<div id='bg-image'>");
                            bgImage.css("width", "100%");
                            bgImage.css("height", "100%");
                            bgImage.css("position", "absolute");
                            bgImage.css("background", "url(img/"+items.image+")");
                            bgImage.css("background-size", "cover")
                            bgImage.css("display", "none")
                            view.append(bgImage);
                            bgImage.fadeIn( "slow" )

                            var bgColor = $("<div id='bg-color'>");
                            bgColor.css("background-color", "#000");
                            bgColor.css("width", "100%");
                            bgColor.css("height", "100%");
                            bgColor.css("position", "absolute");
                            bgColor.css("opacity", "0.7")
                            view.append(bgColor);
                            if (items!=undefined) {
                                var iconContainer = $("<div id='icon-container' style='right: 43px; top: 100px;'>")
                                for (part in items.items) {
                                    switch (items.items[part]) {
                                        case "lampada":
                                            //monta icones de lampada
                                            var contLampOn = $("<div>");
                                            contLampOn.css("float", "left");
                                            var lampOn  = $("<img>");
                                            lampOn.attr("src","img/light-on.png");
                                            contLampOn.append(lampOn);

                                            var contLampOff= $("<div>");
                                            var lampOff = $("<img>");
                                            lampOff.attr("src", "img/light-off.png");
                                            contLampOff.append(lampOff)
                                            contLampOff.css("float", "left");

                                            iconContainer.append(contLampOn);
                                            iconContainer.append(contLampOff);
                                            iconContainer.css("z-index", "99999");
                                            iconContainer.css("position", "absolute");
                                            var lightSwitch = $('<select type="checkbox" id="luz-flipswitch" data-role="flipswitch">' +
                                                '<option value="false">Desl.</option>' +
                                                '<option value="true">Liga</option>' +
                                                '</select>')
                                            lightSwitch.css("float", "left")
                                            iconContainer.append(lightSwitch)
                                            view.append(iconContainer)
                                            lightSwitch.flipswitch({
                                                defaults: true,
                                                status: true
                                            });

                                            var lightsCallback = function(data) {
                                                bgColor.stop()
                                                if (data["status"] == "true") {
                                                    lampOn.show();
                                                    lampOff.hide();
                                                    bgColor.fadeOut( "slow" )
                                                }else{
                                                    lampOn.hide();
                                                    lampOff.show();
                                                    bgColor.fadeIn( "slow" )
                                                }
                                                lightSwitch.val(data["status"]);
                                                lightSwitch.flipswitch('refresh');
                                            }

                                            $.ajax({
                                                url: "status.php",
                                                method: "post",
                                                data: "pino="+items.pino+"" +
                                                "&acao="+lightSwitch.val(),
                                                context: document.body
                                            }).done(lightsCallback)

                                            lightSwitch.change(function(e) {
                                                $.ajax({
                                                    url: "actions.php",
                                                    method: "post",
                                                    data: "pino="+items.pino+
                                                    "&acao="+lightSwitch.val(),
                                                    context: document.body
                                                }).done(lightsCallback)
                                            });
                                            var div = $('<div style="clear: both;">');
                                            iconContainer.append(div)
                                            break;
                                        case "ventilador":
                                            //monta icones de lampada
                                            var contFanOn = $("<div>");
                                            contFanOn.css("float", "left");
                                            var fanOn  = $("<img>");
                                            fanOn.attr("src","img/ventilador-on.png");
                                            contFanOn.append(fanOn);

                                            var contFanOff= $("<div>");
                                            var fanOff = $("<img>");
                                            fanOff.attr("src", "img/ventilador-off.png");
                                            contFanOff.append(fanOff)
                                            contFanOff.css("float", "left");

                                            iconContainer.append(contFanOn);
                                            iconContainer.append(contFanOff);
                                            iconContainer.css("z-index", "99999");
                                            iconContainer.css("position", "absolute");
                                            var fanSwitch = $('<select type="checkbox" id="ventilador-flipswitch" data-role="flipswitch">' +
                                                '<option value="false">Desl.</option>' +
                                                '<option value="true">Liga</option>' +
                                                '</select>')
                                            fanSwitch.css("float", "left")
                                            iconContainer.append(fanSwitch)
                                            view.append(iconContainer)
                                            fanSwitch.flipswitch({
                                                defaults: true,
                                                status: true
                                            });

                                            var fanCallback = function(data) {
                                                bgColor.stop()
                                                if (data["status"] == "true") {
                                                    fanOn.show();
                                                    fanOff.hide();
                                                }else{
                                                    fanOn.hide();
                                                    fanOff.show();
                                                }
                                                fanSwitch.val(data["status"]);
                                                fanSwitch.flipswitch('refresh');
                                            }

                                            $.ajax({
                                                url: "status.php",
                                                method: "post",
                                                data: "pino="+items.pino+"" +
                                                "&acao="+fanSwitch.val(),
                                                context: document.body
                                            }).done(fanCallback)

                                            fanSwitch.change(function(e) {
                                                $.ajax({
                                                    url: "actions.php",
                                                    method: "post",
                                                    data: "pino="+items.pino+
                                                    "&acao="+fanSwitch.val(),
                                                    context: document.body
                                                }).done(fanCallback)
                                            });
                                            break;
                                    }
                                }
                            }

                            title.text($(event.currentTarget).data().title);
                            zoomImage(
                                $(event.currentTarget).position().left,
                                $(event.currentTarget).position().top
                            );
                            $(".zoomPart").hide()
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
                console.log(zoomLeft, zoomTop)
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
                $(".zoomPart").show();
                $("#bg-reset").hide();
                $("#bg-image").remove();
                $("#bg-color").remove();
                $("#icon-container").remove();
                //view.remove($(".icon-container"))
                isZoom = false;
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

            $( document).click(
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
    <div id="content-all" style="margin: 0 auto; width: 680px; display:block;">
        <div style="position: absolute; width: 680px; z-index: 1000; background-color: #1c94c4;color:white">
            <h1 id="title" style="text-align: center"></h1>
        </div>

        <div id="view">
            <img id="image" src="./planta.jpg" width="680" />

        </div>
    </div>
</body>
</html>