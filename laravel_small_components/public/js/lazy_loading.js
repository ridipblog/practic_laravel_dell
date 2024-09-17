$(document).ready(function () {
  var skip = $('.member').length
  var loading = false
  $(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 2) {
      if (loading!=true) {
        loading = true
        console.log(skip)
        $.ajax({
          url: '/lazy-loading',
          type: 'GET',
          data: {
            skip: skip
          },success: function (response) {
            console.log(response)
            if (response === '') {
              $('#content').text('no data')
            //   loading=false;
            }else {
              $('#content').append(response)
              loading=false;
            }
          },error: function (data) {
            console.log(data)
          }
        })
        skip += 10
      }
    }
  })
})
