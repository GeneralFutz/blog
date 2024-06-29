tinymce.PluginManager.add('bootstrapComponents', function (editor, url) {
    // Add a button that adds a container
    editor.ui.registry.addMenuButton('bootstrapContainer', {
        text: 'Container',
        fetch: function (callback) {
            var items = [
                {
                    type: 'menuitem',
                    text: 'Contained',
                    onAction: function () {
                        editor.insertContent('<div class="container">' + editor.selection.getContent() + '</div>');
                    }
                },
                {
                    type: 'menuitem',
                    text: 'Fluid',
                    onAction: function () {
                        editor.insertContent('<div class="container-fluid">' + editor.selection.getContent() + '</div>');
                    }
                }
            ];
            callback(items);
        }
    });

    // Add a button that adds a row with options
    editor.ui.registry.addMenuButton('bootstrapRow', {
        text: 'Row',
        fetch: function (callback) {
            var items = [
                {
                    type: 'menuitem',
                    text: 'Justify Content Start',
                    onAction: function () {
                        editor.insertContent('<div class="row justify-content-start">' + editor.selection.getContent() + '</div>');
                    }
                },
                {
                    type: 'menuitem',
                    text: 'Justify Content Center',
                    onAction: function () {
                        editor.insertContent('<div class="row justify-content-center">' + editor.selection.getContent() + '</div>');
                    }
                },
                {
                    type: 'menuitem',
                    text: 'Justify Content End',
                    onAction: function () {
                        editor.insertContent('<div class="row justify-content-end">' + editor.selection.getContent() + '</div>');
                    }
                },
                // Additional alignment options...
            ];
            callback(items);
        }
    });

    // Add a button that adds columns
    editor.ui.registry.addButton('bootstrapColumns', {
        text: 'Columns',
        onAction: function () {
            var colNumber = prompt("Enter the number of columns:");
            var columnsHtml = '';

            for (var i = 0; i < parseInt(colNumber); i++) {
                columnsHtml += '<div class="col-md">' + editor.selection.getContent() + '</div>';
            }

            editor.insertContent(columnsHtml);
        }
    });

    // Return the metadata
    return {
        getMetadata: function () {
            return {
                name: "Bootstrap Components",
                url: "http://example.com"
            };
        }
    };
});
