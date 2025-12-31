<div>
    <script src="https://cdn.tiny.cloud/1/xf5wmmkxq4nktx4e5xxv0crmxelr86miks5ocgtknrldfier/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof tinymce === 'undefined') {
                console.error('TinyMCE script not loaded!');
                return;
            }
            
            tinymce.init({
                selector: 'textarea#content',
                plugins: 'image link lists media table code directionality',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | link image | rtl ltr | code',
                directionality: 'rtl',
                image_list: @json($imageList),
                height: 500,
                menubar: false,
                branding: false,
                setup: function(editor) {
                    editor.on('change', function() {
                        tinymce.triggerSave();
                    });
                }
            });
        });
    </script>
</div>
