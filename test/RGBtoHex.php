 <!---->
<!--<html>-->
<!--<head>-->
<!--    <script type="text/javascript" async="" src="https://d31qbv1cthcecs.cloudfront.net/atrk.js"></script><script type="text/javascript">-->
<!--        _atrk_opts = { atrk_acct:"nottp1IWh910bm", domain:"seyedrezabazyar.com",dynamic: true};-->
<!--        (function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();-->
<!--    </script>-->
<!--    <noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=nottp1IWh910bm" style="display:none" height="1" width="1" alt="" /></noscript>-->
<!--    <!-- End Alexa Certify Javascript -->-->
<!---->
<!--    <title>ابزار تبدیل کد رنگ ها (Hexadecimal - Decimal) - کد و ابزار سایت | دمو</title>-->
<!---->
<!---->
<!---->
<!--    <style>-->
<!--        input {-->
<!--            outline: none;-->
<!--            padding: 2px 3px;-->
<!--            font-size: 1.0em;-->
<!--        }-->
<!---->
<!--        input[type="button"] {-->
<!--            padding: 5px 6px;-->
<!--            margin-left: 1em;-->
<!--        }-->
<!---->
<!--        input[type="text"]:not([id*="rgb"]) {-->
<!--            width: calc(1.5em + 30px);-->
<!--        }-->
<!---->
<!--        input[type="text"] {-->
<!--            border: 2px solid gray;-->
<!--        }-->
<!---->
<!--        input[id*="red"] {-->
<!--            border: 2px solid #F00;-->
<!--        }-->
<!---->
<!--        input[id*="green"] {-->
<!--            border: 2px solid #0F0;-->
<!--        }-->
<!---->
<!--        input[id*="blue"] {-->
<!--            border: 2px solid #00F;-->
<!--        }-->
<!---->
<!--        span {-->
<!--            font-size: 2em;-->
<!--            font-family: consolas;-->
<!--            position: relative;-->
<!--            top: 0.1em;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<h1>Decimal to Hexadecimal</h1>-->
<!--<span>RGB(</span><input type="text" id="d-red" placeholder="Red" maxlength="3" style="border-color: rgb(250, 0, 0);">-->
<!--<span>,</span><input type="text" id="d-green" placeholder="Green" maxlength="3" style="border-color: rgb(0, 190, 0);">-->
<!--<span>,</span><input type="text" id="d-blue" placeholder="Blue" maxlength="3" style="border-color: rgb(0, 0, 241);"><span>)</span>-->
<!--<span>→ #</span><input type="text" id="rgb2hex" placeholder="Hexadecimal" maxlength="6" style="border-color: rgb(250, 190, 241);">-->
<!--<input type="button" id="d2h" value="Convert">-->
<!---->
<!--<br><br><br>-->
<!---->
<!--<h1>Hexadecimal to Decimal</h1>-->
<!--<span>#</span><input type="text" id="hex2rgb" placeholder="Hexadecimal" maxlength="6" style="border-color: gray;"><span> → </span>-->
<!--<span>RGB(</span><input type="text" id="h-red" placeholder="Red" maxlength="3" style="border-color: rgb(255, 0, 0);">-->
<!--<span>,</span><input type="text" id="h-green" placeholder="Green" maxlength="3" style="border-color: rgb(0, 21, 0);">-->
<!--<span>,</span><input type="text" id="h-blue" placeholder="Blue" maxlength="3" style="border-color: rgb(0, 0, 82);"><span>)</span>-->
<!--<input type="button" id="h2d" value="Convert">-->
<!---->
<!--<script>-->
<!--    var dummyQuery = function(id) {-->
<!---->
<!--        var selector = function(id) {-->
<!--            if (typeof id === 'string') return document.getElementById(id);-->
<!--            if (eid = id.getAttribute('id')) return selector(eid);-->
<!--            return id;-->
<!--        };-->
<!---->
<!--        this.elm = selector(id);-->
<!---->
<!--        this.on = function(event, fn) {-->
<!--            this.elm['on' + event] = fn;-->
<!--            return this;-->
<!--        };-->
<!---->
<!--        this.attr = function(at) {-->
<!--            return this.elm.getAttribute(at);-->
<!--        };-->
<!---->
<!--        this.val = function(newVal) {-->
<!--            if (newVal !== undefined) {-->
<!--                this.elm.value = newVal;-->
<!--                return this;-->
<!--            }-->
<!--            return this.elm.value;-->
<!--        };-->
<!---->
<!--        this.css = function(styles) {-->
<!--            for (var i in styles) {-->
<!--                this.elm.style[i] = styles[i];-->
<!--            }-->
<!--            return this;-->
<!--        };-->
<!---->
<!--        this.convert = function(mode) {-->
<!--            var val = this.val();-->
<!--            if (mode == 'hex') {-->
<!--                return ('0' + Number(val).toString(16)).slice(-2);-->
<!--            } else if (mode == 'dec') {-->
<!--                var c = ['r', 'g', 'b'],-->
<!--                    s = Math.floor(val.length / 3),-->
<!--                    ret = {},-->
<!--                    v;-->
<!--                c.forEach(function(cl, i) {-->
<!--                    ret[cl] = parseInt(((v = val.slice(i++ * s, i * s)) + v).slice(0, 2), '16');-->
<!--                });-->
<!--                return ret;-->
<!--            }-->
<!--            console.log('Undefined "mode" argument');-->
<!--            return this;-->
<!--        };-->
<!---->
<!--        return this;-->
<!--    };-->
<!---->
<!--    (function(w, d) {-->
<!--        w.$ = d;-->
<!--    })(window, dummyQuery);-->
<!---->
<!--    ['d-red', 'd-green', 'd-blue'].forEach(function(id, i) {-->
<!--        var color = [0, 0, 0];-->
<!--        $(id).on('keyup', function() {-->
<!--            color[i] = (c = $(this).val()) ? c : '255';-->
<!--            $(this).css({-->
<!--                'border-color': 'rgb(' + color + ')'-->
<!--            });-->
<!--        });-->
<!--    });-->
<!---->
<!--    $('hex2rgb').on('keyup', function() {-->
<!--        var hex = $(this).val(),-->
<!--            color = ['gray', '#' + hex][Number(!!hex)];-->
<!--        $(this).css({-->
<!--            'border-color': color-->
<!--        });-->
<!--    });-->
<!---->
<!--    $('d2h').on('click', function() {-->
<!--        var r = $('d-red').convert('hex'),-->
<!--            g = $('d-green').convert('hex'),-->
<!--            b = $('d-blue').convert('hex');-->
<!---->
<!--        $('rgb2hex').val(r + g + b).css({-->
<!--            'border-color': '#' + r + g + b-->
<!--        });-->
<!--    });-->
<!---->
<!--    $('h2d').on('click', function() {-->
<!--        var rgb = $('hex2rgb').convert('dec'),-->
<!--            r = rgb.r,-->
<!--            g = rgb.g,-->
<!--            b = rgb.b;-->
<!---->
<!--        $('h-red').val(r).css({-->
<!--            'border-color': 'rgb(' + r + ',0,0)'-->
<!--        });-->
<!--        $('h-green').val(g).css({-->
<!--            'border-color': 'rgb(0,' + g + ',0)'-->
<!--        });-->
<!--        $('h-blue').val(b).css({-->
<!--            'border-color': 'rgb(0,0,' + b + ')'-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--</body>-->
<!--</html>-->


/////////////////////////////

<!--<ul class="themeBox">-->
<!--    <li draggable="false" aria-haspopup="true" data-index="0" style="background: rgb(6, 116, 189);" class=""></li>-->
<!--    <li draggable="false" aria-haspopup="true" data-index="1" style="background: rgb(239, 88, 40);" class=""></li>-->
<!--    <li draggable="false" aria-haspopup="true" data-index="2" style="background: rgb(191, 64, 32);" class="basecolor"></li>-->
<!--    <li draggable="false" aria-haspopup="true" data-index="3" style="background: rgb(89, 89, 89);" class=""></li>-->
<!--    <li draggable="false" aria-haspopup="true" data-index="4" style="background: rgb(14, 14, 14);" class="selected"></li>-->
<!--</ul>-->

///////////////////////////////////////

<?

Class resize
{
    // *** Class variables
    private $image;
    private $width;
    private $height;
    private $imageResized;



    function __construct($fileName)
    {
        // *** Open up the file
        $this->image = $this->openImage($fileName);

        // *** Get width and height
        $this->width  = imagesx($this->image);
        $this->height = imagesy($this->image);
    }

    ## --------------------------------------------------------

    private function openImage($file)
    {
        // *** Get extension
        $extension = strtolower(strrchr($file, '.'));

        switch($extension)
        {
            case '.jpg':
            case '.jpeg':
                $img = @imagecreatefromjpeg($file);
                break;
            case '.gif':
                $img = @imagecreatefromgif($file);
                break;
            case '.png':
                $img = @imagecreatefrompng($file);
                break;
            default:
                $img = false;
                break;
        }
        return $img;
    }

    ## --------------------------------------------------------

    public function resizeImage($newWidth, $newHeight, $option="auto")
    {
        // *** Get optimal width and height - based on $option
        $optionArray = $this->getDimensions($newWidth, $newHeight, $option);

        $optimalWidth  = $optionArray['optimalWidth'];
        $optimalHeight = $optionArray['optimalHeight'];


        // *** Resample - create image canvas of x, y size
        $this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);
        imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);


        // *** if option is 'crop', then crop too
        if ($option == 'crop') {
            $this->crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);
        }
    }

    ## --------------------------------------------------------

    private function getDimensions($newWidth, $newHeight, $option)
    {

        switch ($option)
        {
            case 'exact':
                $optimalWidth = $newWidth;
                $optimalHeight= $newHeight;
                break;
            case 'portrait':
                $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                $optimalHeight= $newHeight;
                break;
            case 'landscape':
                $optimalWidth = $newWidth;
                $optimalHeight= $this->getSizeByFixedWidth($newWidth);
                break;
            case 'auto':
                $optionArray = $this->getSizeByAuto($newWidth, $newHeight);
                $optimalWidth = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
                break;
            case 'crop':
                $optionArray = $this->getOptimalCrop($newWidth, $newHeight);
                $optimalWidth = $optionArray['optimalWidth'];
                $optimalHeight = $optionArray['optimalHeight'];
                break;
        }
        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    ## --------------------------------------------------------

    private function getSizeByFixedHeight($newHeight)
    {
        $ratio = $this->width / $this->height;
        $newWidth = $newHeight * $ratio;
        return $newWidth;
    }

    private function getSizeByFixedWidth($newWidth)
    {
        $ratio = $this->height / $this->width;
        $newHeight = $newWidth * $ratio;
        return $newHeight;
    }

    private function getSizeByAuto($newWidth, $newHeight)
    {
        if ($this->height < $this->width)
            // *** Image to be resized is wider (landscape)
        {
            $optimalWidth = $newWidth;
            $optimalHeight= $this->getSizeByFixedWidth($newWidth);
        }
        elseif ($this->height > $this->width)
            // *** Image to be resized is taller (portrait)
        {
            $optimalWidth = $this->getSizeByFixedHeight($newHeight);
            $optimalHeight= $newHeight;
        }
        else
            // *** Image to be resizerd is a square
        {
            if ($newHeight < $newWidth) {
                $optimalWidth = $newWidth;
                $optimalHeight= $this->getSizeByFixedWidth($newWidth);
            } else if ($newHeight > $newWidth) {
                $optimalWidth = $this->getSizeByFixedHeight($newHeight);
                $optimalHeight= $newHeight;
            } else {
                // *** Sqaure being resized to a square
                $optimalWidth = $newWidth;
                $optimalHeight= $newHeight;
            }
        }

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    ## --------------------------------------------------------

    private function getOptimalCrop($newWidth, $newHeight)
    {

        $heightRatio = $this->height / $newHeight;
        $widthRatio  = $this->width /  $newWidth;

        if ($heightRatio < $widthRatio) {
            $optimalRatio = $heightRatio;
        } else {
            $optimalRatio = $widthRatio;
        }

        $optimalHeight = $this->height / $optimalRatio;
        $optimalWidth  = $this->width  / $optimalRatio;

        return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);
    }

    ## --------------------------------------------------------

    private function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)
    {
        // *** Find center - this will be used for the crop
        $cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );
        $cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );

        $crop = $this->imageResized;
        //imagedestroy($this->imageResized);

        // *** Now crop from center to exact requested size
        $this->imageResized = imagecreatetruecolor($newWidth , $newHeight);
        imagecopyresampled($this->imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);
    }

    ## --------------------------------------------------------

    public function saveImage($savePath, $imageQuality="100")
    {
        // *** Get extension
        $extension = strrchr($savePath, '.');
        $extension = strtolower($extension);

        switch($extension)
        {
            case '.jpg':
            case '.jpeg':
                if (imagetypes() & IMG_JPG) {
                    imagejpeg($this->imageResized, $savePath, $imageQuality);
                }
                break;

            case '.gif':
                if (imagetypes() & IMG_GIF) {
                    imagegif($this->imageResized, $savePath);
                }
                break;

            case '.png':
                // *** Scale quality from 0-100 to 0-9
                $scaleQuality = round(($imageQuality/100) * 9);

                // *** Invert quality setting as 0 is best, not 9
                $invertScaleQuality = 9 - $scaleQuality;

                if (imagetypes() & IMG_PNG) {
                    imagepng($this->imageResized, $savePath, $invertScaleQuality);
                }
                break;

            // ... etc

            default:
                // *** No extension - No save.
                break;
        }

        imagedestroy($this->imageResized);
    }


    ## --------------------------------------------------------

}

?>