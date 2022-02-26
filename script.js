// $(document).ready(function(){

//     $("#search").keyup(function(){
//         var Search=$('#search').val();

//         if (Search!=""){
//             $.ajax({

//              url:'searchdb.php',
//              method: 'POST',
//              data: {search:Search},
//              success: function(data){
//                  $('#dbcontent').html(data);
//              }

//             })

//         }else{

//             $('#dbcontent').html();

//         }
//       $(document).on('click','#', function(){

//         $('#dbcontent').val($(this).text());
//         $('#dbcontent').html('');
//       })

//     })
// })


$(document).ready(function () {
    // Send Search Text to the server
    $("#search").keyup(function () {
      let searchText = $(this).val();
      if (searchText != "") {
        $.ajax({
          url: "action.php",
          method: "post",
          data: {
            query: searchText,
          },
          success: function (response) {
            $("#show-list").html(response);
          },
        });
      } else {
        $("#show-list").html("");
      }
    });
    // Set searched text in input field on click of search button
    $(document).on("click", "a", function () {
      $("#search").val($(this).text());
      $("#show-list").html("");
    });
  });