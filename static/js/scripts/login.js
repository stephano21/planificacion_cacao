export function alert_login(message) {
    let render = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    $("#alert").html(render);
    //alert(message)
};
export function input_only_numbers(target) {
    jQuery("#"+target).on('input', function (e) {
        // Allow only numbers.
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });
}
export function alerts(tag, message){
    let render = `<div class="alert alert-${tag} alert-dismissible fade show" role="alert">
    <strong>${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    $("#alert").html(render);
}
export function update_alert(tag, message){
    let render = `<div class="alert alert-${tag} alert-dismissible fade show" role="alert">
    <strong>${message}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
    //$("#alert").html(render);
    return render
}