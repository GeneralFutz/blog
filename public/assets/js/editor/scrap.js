// Custom button to insert a row with columns
editor.ui.registry.addButton('columns', {
    text: 'Columns',
    onAction: function () {
        // Prompt the user to enter the number of columns
        var cols = prompt("How many columns?");
        if (cols) {
            // Create the row and columns markup
            var rowHtml = '<div class="row">';
            for (var i = 0; i < cols; i++) {
                rowHtml += '<div class="col"><p>Column ' + (i + 1) + '</p></div>';
            }
            rowHtml += '</div>';

            // Insert the row with columns into the editor
            editor.insertContent(rowHtml);
        }
    }
});
// Custom button to add a divider block with a custom class
editor.ui.registry.addButton('classydiv', {
    text: "<div>|</div>",
    onAction: function () {
        // Ask user for class name?
        var classList = prompt("Enter CSS classes separated by a space");
        // Create the wrapper markup
        var classyDiv = '<div class="' + classList + '"><p>&nbsp;</p></div>';
        // Insert the divider
        editor.insertContent(classyDiv);
    }
});