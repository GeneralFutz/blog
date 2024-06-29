/*
  Note: We have included the plugin in the same JavaScript file as the TinyMCE
  instance for display purposes only. Tiny recommends not maintaining the plugin
  with the TinyMCE instance and using the `external_plugins` option.
*/
tinymce.PluginManager.add('bootstrapColumns', (editor, url) => {
    const openDialog = () => editor.windowManager.open({
        title: 'Columns',
        body: {
            type: 'panel',
            items: [
                // number of columns
                {
                    type: 'input', // <-- select form
                    name: 'colN',
                    label: 'Number of columns',
                    // options: ['1':,2,3]
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
                text: 'Save',
                buttonType: 'primary'
            }
        ],
        onSubmit: (api) => {
            const data = api.getData();
            /* Insert content when the window form is submitted */
            var content = '<div class="col-md"></div>'
            editor.insertContent('Title: ' + data.title);
            api.close();
        }
    });
    /* Add a button that opens a window */
    editor.ui.registry.addButton('example', {
        text: 'My button',
        onAction: () => {
            /* Open window */
            openDialog();
        }
    });
    /* Adds a menu item, which can then be included in any menu via the menu/menubar configuration */
    editor.ui.registry.addMenuItem('example', {
        text: 'Example plugin',
        onAction: () => {
            /* Open window */
            openDialog();
        }
    });
    /* Return the metadata for the help plugin */
    return {
        getMetadata: () => ({
            name: 'Example plugin',
            url: 'http://exampleplugindocsurl.com'
        })
    };
});

/*
  The following is an example of how to use the new plugin and the new
  toolbar button.
*/
tinymce.init({
    selector: 'textarea#custom-plugin',
    plugins: 'example help',
    toolbar: 'example | help'
});