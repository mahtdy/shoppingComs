///////////Audio Player///////////////////
(function($) {

    $.fn.audioPlayer = function() {


        return this.each(function (options) {

            var $this = $(this),
                settings = $.extend ({
                    file: "/this/is/the/audio/file.mp3"
                }, options);

            if ($this.data('file')) {
                settings.file = ($this).data('file');
            }

            var audioPlayerMarkup = '<span data-play class="typcn typcn-media-play"></span> <span class="typcn typcn-media-pause" data-pause></span> <span data-elapsed class="audio-time notp">00:00</span><div class="indicator-container"><div class="indicator-bar-empty"><div class="indicator-bar-full"></div></div><div data-playhead class="playhead"></div></div><span data-duration class="audio-time notp trackftime">0:00</span>';
            $this.prepend(audioPlayerMarkup);
            $this.prepend('<audio></audio>');
            var audioFile = $this.children('audio').get(0);
            audioFile.setAttribute('src', settings.file);
            audioFile.setAttribute('preload', 'meta');
            audioFile.setAttribute('volume', '0.8');



            //indicator-bar changes color to indicate percentage loaded
            audioFile.addEventListener('progress', function() {
                if (audioFile.duration > 0) {
                    $this.find('.indicator-bar-full').css('width', function() {
                        var totalBuffered = audioFile.buffered.end(audioFile.buffered.length - 1);
                        var percentLoaded = parseInt(((totalBuffered / audioFile.duration) * 100), 10) + '%';
                        return percentLoaded;
                    });
                }
            });

            //is audioFile sufficiently buffered?
            audioFile.addEventListener('canplay', function() {

                var m = Math.floor(audioFile.duration / 60);
                var s = Math.floor(audioFile.duration % 60);

                if (s < 10) {
                    s = '0' + s;
                }

                $this.find('span[data-duration]').text(m + ':' + s);
            });

            //Play function
            $this.find('span[data-play]').on('click', function() {
                audioFile.play();
            });

            //Pause function
            $this.find('span[data-pause]').on('click', function() {
                audioFile.pause();
            });



            var $playHead = $this.find('div[data-playhead]'),
                $elapsedSpan = $this.find('span[data-elapsed]');

            // //Playhead tracks with timeupdate
            audioFile.addEventListener('timeupdate', function() {
                $playHead.css('margin-left', function() {
                    var progressPercentage = parseInt(((audioFile.currentTime / audioFile.duration) * 100), 10) + '%';
                    return progressPercentage;
                });

                var m = Math.floor(audioFile.currentTime / 60);
                var s = Math.floor(audioFile.currentTime % 60);

                if (m < 10) {
                    m = '0' + m;
                }

                if (s < 10) {
                    s = '0' + s;
                }

                $elapsedSpan.text(m + ':' + s);
            });

            //Clicking indicator-bar moves playhead and updates current time
            $this.find('.indicator-container').on('click', function(event) {
                var clickLocation = (event.pageX - $(this).offset().left) / (this).offsetWidth;
                audioFile.currentTime = clickLocation * audioFile.duration;
            });

            //Dragging the playhead updates current time
            $playHead.on('mousedown', function(event) {

                $(this).parent().addClass('draggable');
                $(this).parent().on('mousemove', function(event) {
                    var clickLocation = (event.pageX - $(this).offset().left) / (this).offsetWidth;
                    audioFile.currentTime = clickLocation * audioFile.duration;
                });

                $(document).on('mouseup', function() {
                    $playHead.parent().off('mousemove');
                });

            });

            //Fallback order: HTML5, then Flash, then "you can download the MP3"
        });
    };

})( jQuery );



