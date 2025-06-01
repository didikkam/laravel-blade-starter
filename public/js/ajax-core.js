// Setup default headers for all AJAX requests
$.ajaxSetup({
    headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Global response handler
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
});

const showResponse = {
    show: function(response) {
        redirect = response.redirect_url || null;
        const icon = response.status || 'error';
        let defaultMessage;
        
        // Set default message berdasarkan status
        switch(icon) {
            case 'success':
                defaultMessage = 'Data has been saved successfully.';
                break;
            case 'error':
                defaultMessage = 'An error occurred while processing your request.';
                break;
            case 'warning':
                defaultMessage = 'Please check your input.';
                break;
            case 'info':
                defaultMessage = 'Information';
                break;
            default:
                defaultMessage = 'The given data was invalid.';
        }
        
        const message = response.message || defaultMessage;
        
        if (response.errors) {
            Swal.fire({
                icon: icon,
                title: message,
                confirmButtonColor: '#3085d6'
            });

            // Update field-specific error messages
            Object.keys(response.errors).forEach(field => {
                const errorContainer = $(`.${field}-error.invalid-feedback`);
                if (errorContainer.length) {
                    const errorMessages = response.errors[field].map(error => 
                        `<li class="list-disc ml-4">${error}</li>`
                    ).join('');
                    errorContainer.html(`<ul class="text-sm space-y-1">${errorMessages}</ul>`);
                }
            });
        } else {
            Swal.fire({
                icon: icon,
                title: message,
                showConfirmButton: icon !== 'success',
                timer: icon === 'success' ? 1500 : undefined,
                confirmButtonColor: '#3085d6'
            }).then(() => {
                if (redirect && icon === 'success') {
                    window.location.href = redirect;
                }
            });
        }
    }
};

// Global AJAX Error Handler
$(document).ajaxError(function(event, xhr, settings) {
    const response = xhr.responseJSON || {};
    
    if (xhr.status === 422) {
        // Validation errors
        response.status = 'error';
        // Clear any previous field errors
        $('.invalid-feedback').empty();
        showResponse.show(response);
        
    } else if (xhr.status === 419) {
        showResponse.show({
            status: 'error',
            message: 'Your session has expired. Please refresh the page.'
        });
    } else {
        showResponse.show(response);
    }
}); 