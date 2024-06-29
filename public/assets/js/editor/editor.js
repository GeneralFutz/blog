tinymce.init({
    selector: '#editor',
    //forced_root_block: 'div',  // Set default block element to div
    setup: function (editor) {
        editor.on('init', function () {
            // Add custom class to h1 block
            editor.formatter.register('title', {
                block: 'h1',
                classes: ['h1', 'title']
            });
        });
    },
    license: 'gpl',
    plugins: 'table image link lists media autoresize help code codesample visualblocks preview',
    external_plugins: {
        'bootstrapComponents': '/assets/js/editor/bootstrapComponents.js'
    },
    menu: {
        bootstrap: { title: 'Bootstrap', items: 'bootstrapContainer bootstrapRow bootstrapColumns' },
    },
    menubar: 'file edit format view bootstrap help',
    toolbar1: 'undo redo | alignleft aligncenter alignright | link image codesample',
    toolbar2: 'styles blocks | bootstrap | columns classydiv | code preview',
    visualblocks_default_state: false,
    end_container_on_empty_block: true,
    // images
    image_title: true,
    image_caption: true,
    image_dimensions: true,
    image_class_list: [
        { title: 'None', value: 'img' },
        { title: 'Thumbnail', value: 'img img-thumb' },
        { title: 'Responsive', value: 'img img-fluid' },
    ],
    image_advtab: true,
    automatic_uploads: true,
    image_prepend_url: 'https://blog.ci4/',
    images_upload_url: '/admin/posts/upload-image', // Updated upload URL
    file_picker_types: 'image',
    file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.addEventListener('load', () => {
                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), {
                    title: file.name
                });
            });
            reader.readAsDataURL(file);
        });
        input.click();
    },
    block_formats: 'Title Heading=title; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Paragraph=p',
    formats: {
        // Changes the default format for h1 to have a class of heading
        h1: { block: 'h2', classes: 'h1' }
    },
    style_formats: [
        {
            title: 'Containers', items: [
                //{ title: 'divider', block: 'div', wrapper: true },
                { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
                { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
                { title: 'blockquote', block: 'blockquote', wrapper: true },
                { title: 'hgroup', block: 'hgroup', wrapper: true },
                { title: 'aside', block: 'aside', wrapper: true },
                { title: 'figure', block: 'figure', wrapper: true }
            ]
        },
        {
            title: 'Custom', items: [
                //{ title: 'Title H1', block: 'h1', classes: 'title' },
            ]
        }
    ],
    // The following option is used to append style formats rather than overwrite the default style formats.
    style_formats_merge: true,
    content_css: ['default', '/assets/css/theme.css'],
    content_css_cors: true,
    // content_style: `
    // /* Custom styles for Bootstrap grid */
    // .row {
    //   display: flex;
    //   margin-right: -15px;
    //   margin-left: -15px;
    // }
    // .col {
    //   flex-basis: 0;
    //   flex-grow: 1;
    //   max-width: 100%;
    //   padding-right: 15px;
    //   padding-left: 15px;
    // }
    // /* Add any additional Bootstrap styles you need */
    // `,
});