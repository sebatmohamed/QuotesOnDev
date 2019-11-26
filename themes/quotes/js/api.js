(function($){

    $('#quote-button').on('click', function(event) {
        event.preventDefault()

        $('#quotes-content').empty();

        $(".loader-gif").css("display", "block");

        let usedNum = [];

        $.ajax({
            method: 'GET', 
            url: wpApiSettings.root + 'wp/v2/posts'
        }).done(function(data){
            $(".loader-gif").fadeOut(1000);
            
            const randNum = Math.floor(Math.random() * data.length);
            const title = data[randNum].title.rendered;
            const content = data[randNum].content.rendered;

            setTimeout(() => {
                $('#quotes-content').html(`<i class="fas fa-quote-left"></i>
                                            <div>
                                                ${content}
                                                <h2>${title}</h2>
                                            </div>
                                            <i class="fas fa-quote-right"></i>`)
            }, 1200);
           
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