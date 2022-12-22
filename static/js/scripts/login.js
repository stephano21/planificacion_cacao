export function alert_login(message) {
    let render = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    $("#alert").html(render);
    //alert(message)
};
export function input_only_numbers() {
    jQuery("#user").on('input', function (e) {
        // Allow only numbers.
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });
}