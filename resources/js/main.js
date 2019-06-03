$(document).ready(function() {
    $(".delete-form").on("submit", function() {
        if (
            confirm(
                "This action MAY NOT be reversible. Are you sure you want to take this action ?"
            )
        ) {
            return true;
        }
        return false;
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
});
