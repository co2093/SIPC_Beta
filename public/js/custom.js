$(document).ready(function(){
    $('#searchInput').keyup(function(){
        var searchText = $(this).val().toLowerCase();
        $('tbody tr').each(function(){
            var found = false;
            $(this).find('td').each(function(){
                if($(this).text().toLowerCase().indexOf(searchText) !== -1){
                    found = true;
                    return false;
                }
            });
            if(found){
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});



/**
$(document).ready(function(){
    $('.nav-link').click(function (e) {
        var $this = $(this);
        if ($this.hasClass('disabled')) {
            e.preventDefault();
            return false;
        }
    });

    function toggleSteps(index) {
        $('.nav-link').each(function (i) {
            if (i <= index) {
                $(this).removeClass('disabled');
            } else {
                $(this).addClass('disabled');
            }
        });
    }

    toggleSteps(0); // Initially enable only the first step
});

**/
