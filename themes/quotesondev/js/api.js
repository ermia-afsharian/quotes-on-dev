(function($) {
 console.log(red_vars)
$('#btn').click( function(){
$.ajax({
  url:red_vars.rest_url + '/wp/v2/posts?filter[orderby]=rand&filter[postperpage]=1'
}
).done(function (data) {
  $('#quotes').innerHTML=" ";
  console.log(data)
  console.log(data[0].title.rendered)
  console.log(data[0].content.rendered)
  console.log(data[0].link)

  const title =data[0].title.rendered;
  const content =data[0].content.rendered;
  const link =data[0].link;
  const html= ` <p><a href='${link}'>${content}</a></p>` + `<p>${title}</p>`
  $('#quotes').html(html)
  window.history.pushState({page: "another"}, "another page", data[0].slug); 
}

)
});
 const submit = $('.wpcf7-form')
 submit.on('submit', function (e) {
  e.preventDefault();
  $.ajax({
      url:red_vars.rest_url + '/wp/v2/posts',
      type: 'POST',
      data : {
        'title' : $('input[name="your-name"]').val() ,
        'content' : $('input[name="your-quote"]').val() ,
        '_qod_quote_source' : $('input[name="your-subject"]').val() ,
        '_qod_quote_source_url' : $('input[name="quote-source-url"]').val() ,
     
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("X-WP-Nonce", red_vars.wpapi_nonce);
      }
  }).done(function(data) {
      alert("success");
  }).fail(function(data) {
      alert("fail");
  })
});




})(jQuery);


