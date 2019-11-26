(function($){

    $('#quote-button').on('click', function(event) {
        event.preventDefault()

        $('#quotes-content').empty();

        let usedNum = [];

        $.ajax({
            method: 'GET', 
            url: wpApiSettings.root + 'wp/v2/posts'
        }).done(function(data){
            
            const randNum = Math.floor(Math.random() * data.length);
            const title = data[randNum].title.rendered;
            const content = data[randNum].content.rendered;

            $('#quotes-content').html(`<h2>${title}</h2>${content}`)

        })
    })

    $('#submit-button').on('click', function(event) {
        const $title = $('#quote-title').val()
        $('#quote-title').val('')

        const data = {
            title: $title
        }


        $.ajax({
            method: 'POST',
            url: wpApiSettings.root + 'wp/v2/posts',
            data,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-NONCE', wpApiSettings.nonce)
            }
        })

    })




})(jQuery);