'use strict';

$(document).ready(function () {

    var x = 'abc';

    $('#gridCategorias').on('click', '.dave-btn-excluir', function (event) {
        var confirm = window.confirm('Tem certeza que deseja excluir a categoria?');

        if (!confirm) {
            event.preventDefault();
        }
    });
});
//# sourceMappingURL=categories.js.map