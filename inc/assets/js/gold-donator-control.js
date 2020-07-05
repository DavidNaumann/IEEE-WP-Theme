( function( $ ) {

    $(window).load(function(){
        var gold_donators_info_json = $("#gold-donators-input").val();
        try {
            gold_donators_info_json = gold_donators_info_json.split('\\').join('');
        }
        catch (e)
        {
            // tis a flesh wound, ignore
        }

        var gold_donators_info;
        try {
            gold_donators_info = JSON.parse(gold_donators_info_json);
        } catch (e)
        {
            gold_donators_info = [];
        }

        $('#gold-donator-control-items').append("<p>Don't forget to fill out the meta for the image sources (Title goes to name, description goes to description, Alt goes to alt) </p>");

        for(var i = 0; i < gold_donators_info.length; i++){
            $('#gold-donator-control-items').append("<div class='gold-donator-collection' id='gold-donator-id-"+ i.toString() +"'> </div>");
            if(gold_donators_info[i] != ""){
                $("#gold-donator-id-" + i.toString()).append("<label><span class='customize-control-title'>"+gold_donators_info[i]['donator_name']+"</span></label>");
                $("#gold-donator-id-" + i.toString()).append( "<img id='donator-image' src='"+gold_donators_info[i]['donator_image']+"'>" );
                $("#gold-donator-id-" + i.toString()).append( "<a id='delete-gold-donator-btn' class='button-secondary'>Delete Sponsor</a>" );
            }
        }
        i++;

        $("#add-gold").click(function(){
            var custom_uploader = wp.media.frames.file_frame = wp.media({
                multiple: true
            });

            custom_uploader.on('select', function() {
                var selection = custom_uploader.state().get('selection');
                selection.map( function( attachment ) {
                    attachment = attachment.toJSON();
                    i++;

                    // Gold Donators Custom Div
                    $('#gold-donator-control-items').append("<div style='border-style: solid;border-width: thin;' class='gold-donator-collection' id='gold-donator-id-"+ i.toString() +"'> </div>");

                    // Gold Donators Image URL
                    $("#gold-donator-id-" + i.toString()).append("<label><span class='customize-control-title'>"+attachment.title+"</span></label>");
                    $("#gold-donator-id-" + i.toString()).append( "<img id='gold-donator-image' src='"+attachment.url+"'>" );

                    $("#gold-donator-id-" + i.toString()).append( "<a id='delete-gold-donator-btn' class='button-secondary'>Delete Sponsor</a>" );
                    gold_donators_info.push({'donator_name': attachment.title, 'donator_desc':attachment.description, 'donator_image': attachment.url});
                    //
                });

                var gold_donators_string = JSON.stringify(gold_donators_info);
                $('#gold-donators-input').val(gold_donators_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click', '#delete-gold-donator-btn', function () {
            var gold_donator_image = $('img', this.parent).attr('src');
            gold_donators_info = gold_donators_info.filter(function (gold_donators, index, arr) {
                return gold_donators.donator_image != gold_donator_image;
            });
            $(event.target).closest(".gold-donator-collection").remove();
            var gold_donators_string = JSON.stringify(gold_donators_info);

            $('#gold-donators-input').val(gold_donators_string).trigger('change');
        });
    });

} )( jQuery );