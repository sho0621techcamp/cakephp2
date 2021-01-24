$(function() {
  $('.like-btn').click(function(e) {
    e.preventDefault();

    var param = $(this).parent('like-form').serializeArray();

    $.ajax({
      url: '/cakephp2/Like/add',
      type: 'POST',
      dataType: 'json',
      data: param,
      timeout: 10000
    }).done(function(result) {
      $(result['received_data']['remark_id']).addClass('disabled');
  
    }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
      alert("失敗");
    });
  });
});