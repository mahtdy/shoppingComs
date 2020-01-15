$(function(){
    $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
    e.preventDefault()
    if($(this).parent().prop('tagName')!=='LI')
    {

        $('ul.nav li a[href="' + $(this).attr('href') + '"]').tab('show');
    }   
    else
    {
        $(this).tab('show')
    }
  })
});
