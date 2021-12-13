jQuery( function( $ ) {
    let comBtn = $('#js-comment');
    let comCon = $('#js-commCont');
    comBtn.on('click', function(){
        comCon.slideToggle();
    });
});


