(function($){

    $('#quote-button').on('click', function(event) {
        event.preventDefault()

        $('#quotes-content').empty();

        $(".loader-gif").css("display", "block");

        let usedNum = [];

        $.ajax({
            method: 'GET', 
            url: qod_data.root_url + '/wp-json/quotes/v1/post'
        }).done(function(data){
            $(".loader-gif").fadeOut(1000);
            console.log(data)
            
            const randNum = Math.floor(Math.random() * data.length);
            const title = data[randNum].title;
            const content = data[randNum].content;

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

    $('#add-quote').on('click', function(event) {
        const $title = $('#quote-title').val();
        $('#quote-title').val('')

        const $quote = $('#quote').val();
        $('#quote').val('')

        const $source = $('#quote-source').val();
        $('#quote-source').val('')

        const $url = $('#quote-url').val();
        $('#quote-url').val('')


        const data = {
            title: $title,
            content: $quote,
            quotesSource: $source,
            quotesURL: $url
        }


        $.ajax({
            method: 'POST',
            url: qod_data.root_url + '/wp-json/wp/v2/posts',
            data,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-NONCE', qod_data.nonce)
            }
        })

    })




})(jQuery);