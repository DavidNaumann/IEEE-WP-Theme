( function( $ ) {

    $(window).load(function(){
        var gold_sponsors_info_json = $("#gold-sponsors-input").val();
        try {
            gold_sponsors_info_json = gold_sponsors_info_json.split('\\').join('');
        }
        catch (e)
        {
            // tis a flesh wound, ignore
        }

        var gold_sponsors_info;
        try {
            gold_sponsors_info = JSON.parse(gold_sponsors_info_json);
        } catch (e)
        {
            gold_sponsors_info = [];
        }

        for(var i = 0; i < gold_sponsors_info.length; i++){
            $('#gold-sponsor-control-items').append("<div class='gold-sponsor-collection' id='gold-sponsor-id-"+ i.toString() +"'> </div>");
            if(gold_sponsors_info[i] != ""){
                $("#gold-sponsor-id-" + i.toString()).append("<label><span class='customize-control-title'>"+gold_sponsors_info[i]['sponsor_name']+"</span></label>");
                $("#gold-sponsor-id-" + i.toString()).append( "<img id='sponsor-image' src='"+gold_sponsors_info[i]['sponsor_image']+"'>" );
                $("#gold-sponsor-id-" + i.toString()).append( "<a id='delete-gold-sponsor-btn' class='button-secondary'>Delete Sponsor</a>" );
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
                    $('#gold-sponsor-control-items').append("<div style='border-style: solid;border-width: thin;' class='gold-sponsor-collection' id='gold-sponsor-id-"+ i.toString() +"'> </div>");

                    // Gold Donators Image URL
                    $("#gold-sponsor-id-" + i.toString()).append("<label><span class='customize-control-title'>"+attachment.title+"</span></label>");
                    $("#gold-sponsor-id-" + i.toString()).append( "<img id='gold-sponsor-image' src='"+attachment.url+"'>" );

                    $("#gold-sponsor-id-" + i.toString()).append( "<a id='delete-gold-sponsor-btn' class='button-secondary'>Delete Sponsor</a>" );
                    gold_sponsors_info.push({'sponsor_name': attachment.title, 'sponsor_alt':attachment.alt, 'sponsor_image': attachment.url});
                    //
                });

                var gold_sponsors_string = JSON.stringify(gold_sponsors_info);
                $('#gold-sponsors-input').val(gold_sponsors_string).trigger('change');
            });
            custom_uploader.open();
        });

        $(document).on('click', '#delete-gold-sponsor-btn', function () {
            let gold_sponsor_image = $(this).parent('.gold-sponsor-collection').find('img').attr('src');
            console.log(gold_sponsor_image);
            console.log($('img', this.parent));
            gold_sponsors_info = gold_sponsors_info.filter(function (gold_sponsor, index, arr) {
                return gold_sponsor.sponsor_image != gold_sponsor_image;
            });
            $(event.target).closest(".gold-sponsor-collection").remove();
            var gold_sponsors_string = JSON.stringify(gold_sponsors_info);

            $('#gold-sponsors-input').val(gold_sponsors_string).trigger('change');
        });
    });

} )( jQuery );