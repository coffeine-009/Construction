@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class = "item">
                <div class = "attachments col-xs-4">
                    <div class = "links">
                        @forelse( $item -> attachments() -> get() as $attachment )
                            <a
                                href="/files/{{ $item -> category_id }}/{{ $item -> id }}/{{ $attachment -> file_name }}"
                                title="{{ $attachment -> file_name }}"
                                data-gallery
                                style = "display: none;"
                            >
                                <img
                                    src="/files/{{ $item -> category_id }}/{{ $item -> id }}/{{ $attachment -> file_name }}"
                                    alt="{{ $attachment -> file_name }}"
                                />
                            </a>
                        @empty
                            <a
                                href="/files/no-attachments.jpg"
                                title="No images"
                                data-gallery
                            >
                                <img
                                    src="/files/no-attachments.jpg"
                                    alt="No images"
                                />
                            </a>
                        @endforelse
                        <div class = "counter">1/{{ count( $item -> attachments ) }}</div>
                    </div>
                    </div>
                    <div class = "col-xs-8">
                    <div class = "title">{{ $item -> title }}</div>
                    <div class = "description">{{ $item -> description }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">


    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="js/bootstrap-image-gallery.min.js"></script>

    <script type="application/javascript">
        $( '.item>.attachments .links a:first').css({'display': 'block'});
    </script>
@endsection

