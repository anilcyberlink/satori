
var editor_config = {
    license_key: 'gpl',
    selector: 'textarea.my-editor',
    height: 500,
    menubar: true,

    relative_urls: false,

    plugins: [
        'advlist',
        'anchor',
        'autolink',
        'charmap',
        'code',
        'emoticons',
        'fullscreen',
        'image',
        'insertdatetime',
        'link',
        'lists',
        'media',
        'pagebreak',
        'preview',
        'searchreplace',
        'table',
        'visualblocks',
        'visualchars',
        'wordcount'
    ],

    toolbar: [
        'undo redo | blocks | fontfamily fontsize |',
        'bold italic underline strikethrough removeformat |',
        'alignleft aligncenter alignright alignjustify |',
        'outdent indent | bullist numlist |',
        'forecolor backcolor |',
        'link unlink image media |',
        'charmap emoticons |',
        'table | hr | insertdatetime | code fullscreen preview'
    ].join(' '),

    toolbar_mode: 'sliding',

    forced_root_block: 'p',
    entity_encoding: 'raw',

    valid_elements: '*[*]',

    file_picker_types: 'file image media',

    file_picker_callback: function(callback, value, meta) {

        var x = window.innerWidth ||
            document.documentElement.clientWidth ||
            document.body.clientWidth;

        var y = window.innerHeight ||
            document.documentElement.clientHeight ||
            document.body.clientHeight;

        var cmsURL = '/laravel-filemanager?editor=' + meta.fieldname;

        if (meta.filetype === 'image') {
            cmsURL += '&type=Images';
        } else if (meta.filetype === 'media') {
            cmsURL += '&type=Videos';
        } else {
            cmsURL += '&type=Files';
        }

        tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: cmsURL,
            width: x * 0.8,
            height: y * 0.8,
            resizable: true,
            close_previous: false,

            onMessage: function(api, message) {
                callback(message.content);
            }
        });
    }
};

tinymce.init(editor_config);
