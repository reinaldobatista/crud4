
// $('#visualiza').on('click',(function(){
//     $('.btn-danger').click( function(e){
//       confirmdelete(e);
//     });
// }));
$(document).ready(function(){
  $('.btn-danger').click( function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Você tem Certeza que Deseja Excluir este Registro ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Apaga'
      }).then((result) => {
        if (result.value) {
          $(document).ready(function(){
            $(e.target).closest('form').submit();
          });
        }
      })
  });
});
// $(document).ready(function(){
//   $('.btn-danger').click( function(e){
//     confirmdelete(e);
//   });
// });
// function confirmdelete(e)
// {
//   $(document).ready(function(){
//     e.preventDefault();
//     Swal.fire({
//         title: 'Você tem Certeza que Deseja Excluir este Registro ?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Apaga'
//       }).then((result) => {
//         if (result.value) {
//           $(document).ready(function(){
//             // $(e.target).find('.form-danger').submit();
//             // $(e.target).closest('form').submit();
//           });
//         }
//       })
//   });
    
// }
