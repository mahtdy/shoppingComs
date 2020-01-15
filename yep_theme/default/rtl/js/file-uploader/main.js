$(function () {
    'use strict';
    // Initialize the jQuery File Upload widget:
    $('#fileuploadimage').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/index.php',
        dataType: 'json',
        maxNumberOfFiles: 20,
        acceptFileTypes: /(\.|\/)(jpg|jpeg|png|x-png)$/i,
        maxFileSize: 5000000
    });
    $('#fileuploadpdf').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/ads_pdf.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(pdf)$/i,
        maxFileSize: 5000000
    });
    $('#fileuploadvideo').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/ads_video.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(mp4|flv)$/i,
        maxFileSize: 5000000
    });
    $('#fileuploadvoice').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/ads_vocie.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(mp3|wav)$/i,
        maxFileSize: 5000000
    });
    $('#fileuploadzip').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/index.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(zip)$/i,
        maxFileSize: 5000000
    });
    $('#email_zip_up').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/email_zip.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(zip)$/i,
        maxFileSize: 5000000
    });	
	
 $('#pm_pic_up').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/pm_pic.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(jpg|jpeg|png|x-png)$/i,
        maxFileSize: 5000000
    });
    $('#pm_zip_up').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/pm_zip.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(zip)$/i,
        maxFileSize: 5000000
    });	
	    $('#ticket_zip_up').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/ticket_zip.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(zip)$/i,
        maxFileSize: 5000000
    });	
	 $('#ticket_pic_up').fileupload({
	// alert('dsdfd');
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/ticket_pic.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(jpg|jpeg|png|x-png)$/i,
        maxFileSize: 5000000
    });
	  $('#products_pdf_up').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/products_pdf.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(pdf)$/i,
        maxFileSize: 5000000
    });
	
	    $('#products_video').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/products_video.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(mp4|flv)$/i,
        maxFileSize: 5000000
    });
	$('#service_pdf_up').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/service_pdf.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(pdf)$/i,
        maxFileSize: 5000000
    });
	
    $('#service_video').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: '/server/php/service_video.php',
        dataType: 'json',
        maxNumberOfFiles: 1,
        acceptFileTypes: /(\.|\/)(mp4|flv)$/i,
        maxFileSize: 5000000
    });
});
