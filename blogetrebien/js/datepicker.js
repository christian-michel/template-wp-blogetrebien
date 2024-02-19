jQuery(document).ready(function($)
{
$("._cmb_datestage").datepicker({
    dateFormat: 'D, M d, yy',
    showOn: 'button',
    buttonImage: '/yourpath/icon-datepicker.png',
    buttonImageOnly: true,
    numberOfMonths: 3
 
    });
});