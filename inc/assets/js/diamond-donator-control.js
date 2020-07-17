( function( $ ) {

    $(window).load(function(){
        var diamond_donators_info_json = $("#diamond-donators-input").val();
        try {
            diamond_donators_info_json = diamond_donators_info_json.split('\\').join('');
        }
        catch (e)
        {
            // tis but a flesh wound
        }

        var diamond_donators_info;
        try {
            diamond_donators_info = JSON.parse(diamond_donators_info_json);
        } catch (e)
        {
            diamond_donators_info = [];
        }

        for(var i = 0; i < diamond_donators_info.length; i++){
            $('#diamond-donator-control-items').append("<div class='diamond-donator-collection' id='diamond-donator-id-"+ i.toString() +"'> </div>");
            if(diamond_donators_info[i] != ""){
                $("#diamond-donator-id-" + i.toString()).append("<label><span class='customize-control-title'>"+diamond_donators_info[i]['donator_name']+"</span></label>");
                $("#diamond-donator-id-" + i.toString()).append( "<img id='donator-image' src='"+diamond_donators_info[i]['donator_image']+"'>" );
                $("#diamond-donator-id-" + i.toString()).append( "<a id='delete-diamond-donator-btn' class='button-secondary'>Delete Sponsor</a>" );
            }
        }
        i++;

        $("#add-diamond").click(function(){
            var custom_uploader = wp.media.frames.file_frame = wp.media({
                multiple: true
            });

            custom_uploader.on('select', function() {
                var selection = custom_uploader.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    i++;

                    // Diamond Donators Custom Div
                    $('#diamond-donator-control-items').append("<div style='border-style: solid;border-width: thin;' class='diamond-donator-collection' id='diamond-donator-id-"+ i.toString() +"'> </div>");

                    // Diamond Donators Image URL
                    $("#diamond-donator-id-" + i.toString()).append("<label><span class='customize-control-title'>"+attachment.title+"</span></label>");
                    $("#diamond-donator-id-" + i.toString()).append( "<img id='diamond-donator-image' src='"+attachment.url+"'>" );

                    $("#diamond-donator-id-" + i.toString()).append( "<a id='delete-diamond-donator-btn' class='button-secondary'>Delete Sponsor</a>" );
                    diamond_donators_info.push({'donator_name': attachment.title, 'donator_alt':attachment.alt, 'donator_image': attachment.url});
                    //
                });

                var diamond_donators_string = JSON.stringify(diamond_donators_info);
                $('#diamond-donators-input').val(diamond_donators_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click', '#delete-diamond-donator-btn', function () {
            let diamond_donator_image = $(this).parent('.diamond-donator-collection').find('img').attr('src');
            console.log(diamond_donator_image);
            console.log($('img', this.parent));
            diamond_donators_info = diamond_donators_info.filter(function (diamond_donator, index, arr) {
                return diamond_donator.donator_image != diamond_donator_image;
            });
            $(event.target).closest(".diamond-donator-collection").remove();
            var diamond_donators_string = JSON.stringify(diamond_donators_info);

            $('#diamond-donators-input').val(diamond_donators_string).trigger('change');
        });
    });

} )( jQuery );