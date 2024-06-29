tinymce.PluginManager.add('bootstrapComponents', function (editor, url) {
    // Container, Container-Fluid
    editor.ui.registry.addMenuItem('bootstrapContainer', {
        text: 'Container',
        onAction: function () {
            editor.windowManager.open({
                title: 'Insert Container',
                body: {
                    type: 'panel',
                    items: [
                        {
                            type: 'selectbox',
                            name: 'containerType',
                            label: 'Type',
                            items: [
                                { value: 'container', text: 'Contained' },
                                { value: 'container-fluid', text: 'Fluid' }
                            ]
                        }
                    ]
                },
                buttons: [
                    {
                        type: 'cancel',
                        text: 'Close'
                    },
                    {
                        type: 'submit',
                        text: 'Insert',
                        primary: true
                    }
                ],
                onSubmit: function (api) {
                    var data = api.getData();
                    editor.insertContent('<div class="' + data.containerType + '">' + editor.selection.getContent() + '</div>');
                    api.close();
                }
            });
        }
    });
    // Add a button that adds a row with options
    editor.ui.registry.addMenuItem('bootstrapRow', {
        text: 'Row',
        onAction: function () {
            editor.windowManager.open({
                title: 'Insert Row',
                body: {
                    type: 'panel',
                    items: [
                        {
                            type: 'selectbox',
                            name: 'rowAlignment',
                            label: 'Alignment',
                            items: [
                                { value: '', text: 'None' },
                                { value: 'justify-content-start', text: 'Start' },
                                { value: 'justify-content-center', text: 'Center' },
                                { value: 'justify-content-end', text: 'End' },
                                { value: 'justify-content-around', text: 'Around' },
                                { value: 'justify-content-between', text: 'Between' }
                            ]
                        },
                        {
                            type: 'selectbox',
                            name: 'withColumns',
                            label: 'Add Columns',
                            items: [
                                { value: '0', text: "None" },
                                { value: '1', text: "One" },
                                { value: '2', text: "Two" },
                                { value: '3', text: "Three" },
                                { value: '4', text: "Four" },
                            ]
                        }
                    ]
                },
                buttons: [
                    {
                        type: 'cancel',
                        text: 'Close'
                    },
                    {
                        type: 'submit',
                        text: 'Insert',
                        primary: true
                    }
                ],
                onSubmit: function (api) {
                    var data = api.getData();
                    if (data.withColumns != 0) {
                        editor.insertContent('<div class="row-cols-' + data.withColumns + ' ' + data.rowAlignment + '"><p>' + editor.selection.getContent() + '</p</div>');
                        for (var i = 0; i < parseInt(data.withColumns); i++) {
                            columnsHtml += '<div class="col"><p>' + editor.selection.getContent() + '</p></div>';
                        }
                    } else {
                        editor.insertContent('<div class="row ' + data.rowAlignment + '"><p>' + editor.selection.getContent() + '</p></div>');
                    }
                    api.close();
                }
            });
        }
    });


    // Add a button that adds columns
    editor.ui.registry.addMenuItem('bootstrapColumns', {
        text: 'Row with Columns',
        onAction: function () {
            editor.windowManager.open({
                title: 'Insert Columns',
                body: {
                    type: 'panel',
                    items: [
                        {
                            type: 'input',
                            name: 'numberOfColumns',
                            label: 'Number of Columns',
                            inputMode: 'numeric'
                        },
                        {
                            type: 'input',
                            name: 'columnWidth',
                            label: 'Width of Each Column (e.g., 6 for col-md-6)',
                            inputMode: 'numeric'
                        }
                    ]
                },
                buttons: [
                    {
                        type: 'cancel',
                        text: 'Close'
                    },
                    {
                        type: 'submit',
                        text: 'Insert',
                        primary: true
                    }
                ],
                onSubmit: function (api) {
                    var data = api.getData();
                    var columnsHtml = '';
                    for (var i = 0; i < parseInt(data.numberOfColumns); i++) {
                        columnsHtml += '<div class="col-md-' + data.columnWidth + '"></div>';
                    }
                    editor.insertContent('<div class="row">' + columnsHtml + '</div>');
                    api.close();
                }
            });
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
