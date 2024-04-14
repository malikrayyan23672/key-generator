if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

const time = document.getElementById('timer');
const title = document.querySelectorAll('#title');
const delete_btn = document.querySelectorAll('#delete-btn');

title.forEach((t) => {
    let time = t.textContent;
    let days;
    let minutes;
    let second;
    setInterval(() => {
        console.log(time.charAt(6))
    },1000)
})


delete_btn.forEach((e) => {
    e.addEventListener('click', () => {

        $.ajax({
            url: "delete.php",
            data: {
                'id': e.dataset.id,
            },

            success: function(response){
                location.reload();
            }
        })
    })
})

$(document).ready(function(e){

//    setInterval(() => {
//         $.ajax({
//         url: "keys.php",
//         type: "post",
//         dataType: 'json',
//         cache: false,

//         success: function(response){
//         }
//     })
//    },1000) 

})