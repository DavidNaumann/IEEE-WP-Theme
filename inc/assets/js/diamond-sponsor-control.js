( function( $ ) {

    $(window).load(function(){
        var diamond_sponsors_info_json = $("#diamond-sponsors-input").val();
        try {
            diamond_sponsors_info_json = diamond_sponsors_info_json.split('\\').join('');
        }
        catch (e)
        {
            // tis but a flesh wound
        }

        var diamond_sponsors_info;
        try {
            diamond_sponsors_info = JSON.parse(diamond_sponsors_info_json);
        } catch (e)
        {
            diamond_sponsors_info = [];
        }

        for(var i = 0; i < diamond_sponsors_info.length; i++){
            $('#diamond-sponsor-control-items').append("<div class='diamond-sponsor-collection' id='diamond-sponsor-id-"+ i.toString() +"'> </div>");
            if(diamond_sponsors_info[i] != ""){
                $("#diamond-sponsor-id-" + i.toString()).append("<label><span class='customize-control-title'>"+diamond_sponsors_info[i]['sponsor_name']+"</span></label>");
                $("#diamond-sponsor-id-" + i.toString()).append( "<img id='sponsor-image' src='"+diamond_sponsors_info[i]['sponsor_image']+"'>" );
                $("#diamond-sponsor-id-" + i.toString()).append( "<a id='delete-diamond-sponsor-btn' class='button-secondary'>Delete Sponsor</a>" );
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
                    $('#diamond-sponsor-control-items').append("<div style='border-style: solid;border-width: thin;' class='diamond-sponsor-collection' id='diamond-sponsor-id-"+ i.toString() +"'> </div>");

                    // Diamond Donators Image URL
                    $("#diamond-sponsor-id-" + i.toString()).append("<label><span class='customize-control-title'>"+attachment.title+"</span></label>");
                    $("#diamond-sponsor-id-" + i.toString()).append( "<img id='diamond-sponsor-image' src='"+attachment.url+"'>" );

                    $("#diamond-sponsor-id-" + i.toString()).append( "<a id='delete-diamond-sponsor-btn' class='button-secondary'>Delete Sponsor</a>" );
                    diamond_sponsors_info.push({'sponsor_name': attachment.title, 'sponsor_alt':attachment.alt, 'sponsor_image': attachment.url});
                    //
                });

                var diamond_sponsors_string = JSON.stringify(diamond_sponsors_info);
                $('#diamond-sponsors-input').val(diamond_sponsors_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click', '#delete-diamond-sponsor-btn', function () {
            let diamond_sponsor_image = $(this).parent('.diamond-sponsor-collection').find('img').attr('src');
            console.log(diamond_sponsor_image);
            console.log($('img', this.parent));
            diamond_sponsors_info = diamond_sponsors_info.filter(function (diamond_sponsor, index, arr) {
                return diamond_sponsor.sponsor_image != diamond_sponsor_image;
            });
            $(event.target).closest(".diamond-sponsor-collection").remove();
            var diamond_sponsors_string = JSON.stringify(diamond_sponsors_info);

            $('#diamond-sponsors-input').val(diamond_sponsors_string).trigger('change');
        });
    });

} )( jQuery );