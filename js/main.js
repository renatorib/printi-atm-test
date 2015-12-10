$(document).ready(function(){

    var updateNotes = function(){
        var value = $('.calculate').find('.value').val();
        $.ajax({
            url: "/api/calculate/" + value,
            dataType: 'json'
        })
        .done(function(res){
            var $notes = $('.notes');
            $notes.html('');
            if(!res.error){
                $.each(res, function(note, qty){
                    var $note = $('<div>').addClass('note');
                    $note
                        .html(qty + (qty == 1 ? ' note' : ' notes') + ' of ' + note)
                        .jAnimate('flipInX')
                        .prependTo($notes)
                    ;
                });
            } else {
                var $error = $('<div>').addClass('error');
                $error
                    .html(res.error)
                    .jAnimate('fadeIn')
                    .appendTo($notes)
                ;
            }
        });
    }

    $('.calculate').submit(function(e){
        e.preventDefault();
        updateNotes();
    });

});
