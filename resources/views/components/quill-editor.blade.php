@props(['label', 'name', 'id'])
<fieldset class="form-group">
    <label for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <textarea rows="10" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" class="form-control quill">
        {{ $slot }}
    </textarea>
</fieldset>
<script src="{{ asset('assets/vendors/js/editors/quill/quill.min.js') }}"></script>
{{--<script src="{{ asset('assets/vendors/js/editors/quill/katex.min.js') }}"></script>--}}

<script>
    var quill = new Quill('.quill', {
        modules: {
            // 'formula': true,
            // 'syntax': true,
            'toolbar': [
                [{
                    'size': []
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'script': 'super'
                }, {
                    'script': 'sub'
                }],
                [{
                    'header': '1'
                }, {
                    'header': '2'
                }, 'blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                [{
                    'align': []
                }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ],
        },
        theme: 'snow'
    });
</script>
