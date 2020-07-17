( function( $ ) {

    $(window).load(function(){
        var silver_donators_info_json = $("#silver-donators-input").val();
        try {
            silver_donators_info_json = silver_donators_info_json.split('\\').join('');
        }
        catch (e)
        {
            // tis a flesh wound, ignore
        }

        var silver_donators_info;
        try {
            silver_donators_info = JSON.parse(silver_donators_info_json);
        } catch (e)
        {
            silver_donators_info = [];
        }

        for(var i = 0; i < silver_donators_info.length; i++){
            $('#silver-donator-control-items').append("<div class='silver-donator-collection' id='silver-donator-id-"+ i.toString() +"'> </div>");
            if(silver_donators_info[i] != ""){
                $("#silver-donator-id-" + i.toString()).append("<label><span class='customize-control-title'>"+silver_donators_info[i]['donator_name']+"</span></label>");
                $("#silver-donator-id-" + i.toString()).append( "<img id='donator-image' src='"+silver_donators_info[i]['donator_image']+"'>" );
                $("#silver-donator-id-" + i.toString()).append( "<a id='delete-silver-donator-btn' class='button-secondary'>Delete Sponsor</a>" );
            }
        }
        i++;

        $("#add-silver").click(function(){
            var custom_uploader = wp.media.frames.file_frame = wp.media({
                multiple: true
            });

            custom_uploader.on('select', function() {
                var selection = custom_uploader.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    i++;

                    // Silver Donators Custom Div
                    $('#silver-donator-control-items').append("<div style='border-style: solid;border-width: thin;' class='silver-donator-collection' id='silver-donator-id-"+ i.toString() +"'> </div>");

                    // Silver Donators Image URL
                    $("#silver-donator-id-" + i.toString()).append("<label><span class='customize-control-title'>"+attachment.title+"</span></label>");
                    $("#silver-donator-id-" + i.toString()).append( "<img id='silver-donator-image' src='"+attachment.url+"'>" );

                    $("#silver-donator-id-" + i.toString()).append( "<a id='delete-silver-donator-btn' class='button-secondary'>Delete Sponsor</a>" );
                    silver_donators_info.push({'donator_name': attachment.title, 'donator_alt':attachment.alt, 'donator_image': attachment.url});
                    //
                });

                var silver_donators_string = JSON.stringify(silver_donators_info);
                $('#silver-donators-input').val(silver_donators_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click', '#delete-silver-donator-btn', function () {
            let silver_donator_image = $(this).parent('.silver-donator-collection').find('img').attr('src');
            console.log(silver_donator_image);
            console.log($('img', this.parent));
            silver_donators_info = silver_donators_info.filter(function (silver_donator, index, arr) {
                return silver_donator.donator_image != silver_donator_image;
            });
            $(event.target).closest(".silver-donator-collection").remove();
            var silver_donators_string = JSON.stringify(silver_donators_info);

            $('#silver-donators-input').val(silver_donators_string).trigger('change');
        });
    });

} )( jQuery );