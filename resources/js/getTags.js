$(document).ready(function(){
    var tagCount = 0;
    var tags = [];
    $('#tag__autocomplete').keyup(function(){
            
        getAutocomplete();

        
    });

    function getAutocomplete(){

        $.ajax({
            type:"POST",
            url:'/getTags',
            data:{
                'msg' : $('#tag__autocomplete').val(),
                'tags': tags
            },
            dataType: "json",
            success:function(data){
                if(Array.isArray(data) == false){
                    data = Object.values(data);
                }
                console.log(data);
                $(".autocomplete-suggestions").html("");
                data.forEach(function(tag, index){
                    $(".autocomplete-suggestions").append(
                        "<p class='autocomplete-suggestion' data-id='tag-"+tag.name+"'>" + tag.name +"</p>"
                    );

                });
                
            },
            error:function(e){
                console.log(e);
            }
            
        });
    }

    $(".autocomplete-suggestions").on('click', ".autocomplete-suggestion", function(){
        if(tagCount < 5){
            var tag = $(this).html();

            tagCount++;
            $('.autocomplete-suggestion[data-id="tag-'+tag+'"]').addClass('tagSelected');
            $('#tags').val($('#tags').val()+tag+ " ");
            $('.tags__selected').html( $('.tags__selected').html() + " <div class='selected-tag-container'> <p class='selected-tag'>" + tag + "</p> <span class='delete-tag'>X</span> </div>");

            tags.push(tag);

            getAutocomplete();
        }
    });

    $(".tags__selected").on('click', ".selected-tag-container", function(){
        
        var tag = $(this).children('.selected-tag')[0].innerHTML;
        tagCount--;
        $('.autocomplete-suggestion[data-id="tag-'+tag+'"]').removeClass('tagSelected');
        var oldVal = $('#tags').val();
        var oldValSplit = oldVal.replace(tag, '');
        $('#tags').val(oldValSplit);
        $(this).remove();
        var index = tags.indexOf(tag);
        if (index > -1) {
            tags.splice(index, 1);
        }

        getAutocomplete();
    });

});