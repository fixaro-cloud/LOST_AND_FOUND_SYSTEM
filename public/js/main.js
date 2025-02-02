
const reportDelBtns = document.querySelectorAll('.report-del-btn');
const userDelBtns = document.querySelectorAll('.user-del-btn');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


reportDelBtns.forEach((reportDelBtn) => {
    reportDelBtn.addEventListener('click', (e) => {
        
      let ancestor;
      
      if(reportDelBtn.closest('.lost-item-card')){
         ancestor = reportDelBtn.closest('.lost-item-card');
      }else if(reportDelBtn.closest('.found-item-card')){
         ancestor = reportDelBtn.closest('.found-item-card');
      }

        swal({
            title: "Are you sure you want to delete?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                if(ancestor.classList.contains('lost-item-card')){
                  ancestor.remove(); 
                  deleteLostItem(ancestor.id);
                }else if(ancestor.classList.contains('found-item-card')){
                  ancestor.remove(); 
                  deleteFoundItem(ancestor.id);
                }
                
            } 
          });
          
    });
});

function deleteLostItem(itemId) {

  const url = `/api/lost-items/${itemId}/delete`;
  
    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            // 'X-CSRF-TOKEN': csrfToken, // Add CSRF token to headers

            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to delete the lost item');
        }
    })
    .then(data => {
        console.log(data.message); 
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function deleteFoundItem(itemId) {

  const url = `/api/found-items/${itemId}/delete`;
  
    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            // 'X-CSRF-TOKEN': csrfToken, // Add CSRF token to headers

            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to delete the lost item');
        }
    })
    .then(data => {
        console.log(data.message); 
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// userDelBtns.forEach((userDelBtn) => {
//     userDelBtn.addEventListener('click', (e)=> {

//         let ancestor = userDelBtn.closest('.user');
    
//         swal({
//             title: "Are you sure you want to delete?",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//           })
//           .then((willDelete) => {
//             if (willDelete) {

//                 if(ancestor.classList.contains('user')){
//                   ancestor.remove(); 
//                   console.log(ancestor.id);
//                   deleteUser(ancestor.id);
//                 }             
//             } 
//           });
//     });
// });

// function deleteUser(userId){
//     const url = `/api/admin-dashboard/${userId}/delete`;
  
//     fetch(url, {
//         method: 'DELETE',
//         headers: {
//             'Content-Type': 'application/json',
//             // 'X-CSRF-TOKEN': csrfToken, // Add CSRF token to headers

//             'Accept': 'application/json'
//         }
//     })
//     .then(response => {
//         if (response.ok) {
//             return response.json();
//         } else {
//             throw new Error('Failed to delete the lost item');
//         }
//     })
//     .then(data => {
//         console.log(data.message); 
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }




