<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<div id="editor">
    <p>Hello World!</p>
    <p>Some initial <strong>bold</strong> text</p>
    <p><br></p>
    </div>

    


    
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <style>
    .ql-editor {
        font-family: 'Nunito', sans-serif;
    }
    .ql-toolbar.ql-snow {
        border: 1px solid #f0ecec;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .ql-container.ql-snow {
        border: 1px solid #f0ecec;
        border-bottom-left-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
    }
    </style>
    
    <!-- Initialize Quill editor -->
    <script>

    new Quill('#editor', {
        bounds: '#editor',
        modules: {
            'syntax': true,
            'toolbar': [
                [
                    {
                    'size': []
                    }
            ],
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
                    'direction': 'rtl'
                }, {
                    'align': []
                }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ],
        },
        theme: 'snow'
    });
    </script>