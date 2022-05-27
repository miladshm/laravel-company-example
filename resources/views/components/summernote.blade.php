@props(['label', 'name', 'id'])

<fieldset>
    <fieldset class="form-group">
        <label class="col-form-label" for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
        <textarea rows="10" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" class="form-control summernote">
            {{ $slot }}
        </textarea>
    </fieldset>
</fieldset>
@push('js')
<script>
    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {
                lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
                    lfmItems.forEach(function (lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };
    $(document).ready(function() {
        $('.summernote').summernote({
            minHeight: 300,
            lang: 'fa-IR',
            toolbar: [
                ['para', ['ul', 'ol', 'paragraph']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['height', ['height']],
                ['style', ['style']],
                ['table', ['table']],
                ['insert', ['link','fm']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            buttons: {
                fm: LFMButton
            }
        });
    });
</script>
@endpush
