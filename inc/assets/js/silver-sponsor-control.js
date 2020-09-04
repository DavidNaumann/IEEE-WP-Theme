( function( $ ) {

    $(window).load(function(){
        var silver_sponsors_info_json = $("#silver-sponsors-input").val();
        try {
            silver_sponsors_info_json = silver_sponsors_info_json.split('\\').join('');
        }
        catch (e)
        {
            // tis a flesh wound, ignore
        }

        var silver_sponsors_info;
        try {
            silver_sponsors_info = JSON.parse(silver_sponsors_info_json);
        } catch (e)
        {
            silver_sponsors_info = [];
        }

        for(var i = 0; i < silver_sponsors_info.length; i++){
            $('#silver-sponsor-control-items').append("<div class='silver-sponsor-collection' id='silver-sponsor-id-"+ i.toString() +"'> </div>");
            if(silver_sponsors_info[i] != ""){
                $("#silver-sponsor-id-" + i.toString()).append("<label><span class='customize-control-title'>"+silver_sponsors_info[i]['sponsor_name']+"</span></label>");
                $("#silver-sponsor-id-" + i.toString()).append( "<img id='sponsor-image' src='"+silver_sponsors_info[i]['sponsor_image']+"'>" );
                $("#silver-sponsor-id-" + i.toString()).append( "<a id='delete-silver-sponsor-btn' class='button-secondary'>Delete Sponsor</a>" );
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
                    $('#silver-sponsor-control-items').append("<div style='border-style: solid;border-width: thin;' class='silver-sponsor-collection' id='silver-sponsor-id-"+ i.toString() +"'> </div>");

                    // Silver Donators Image URL
                    $("#silver-sponsor-id-" + i.toString()).append("<label><span class='customize-control-title'>"+attachment.title+"</span></label>");
                    $("#silver-sponsor-id-" + i.toString()).append( "<img id='silver-sponsor-image' src='"+attachment.url+"'>" );

                    $("#silver-sponsor-id-" + i.toString()).append( "<a id='delete-silver-sponsor-btn' class='button-secondary'>Delete Sponsor</a>" );
                    silver_sponsors_info.push({'sponsor_name': attachment.title, 'sponsor_alt':attachment.alt, 'sponsor_image': attachment.url});
                    //
                });

                var silver_sponsors_string = JSON.stringify(silver_sponsors_info);
                $('#silver-sponsors-input').val(silver_sponsors_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click', '#delete-silver-sponsor-btn', function () {
            let silver_sponsor_image = $(this).parent('.silver-sponsor-collection').find('img').attr('src');
            console.log(silver_sponsor_image);
            console.log($('img', this.parent));
            silver_sponsors_info = silver_sponsors_info.filter(function (silver_sponsor, index, arr) {
                return silver_sponsor.sponsor_image != silver_sponsor_image;
            });
            $(event.target).closest(".silver-sponsor-collection").remove();
            var silver_sponsors_string = JSON.stringify(silver_sponsors_info);

            $('#silver-sponsors-input').val(silver_sponsors_string).trigger('change');
        });
    });

} )( jQuery );