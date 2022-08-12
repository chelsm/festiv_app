async function like(item) {
   let id =item.id;
   let url = "/likes/add/"+id;
   try {
        let res = await fetch(url, {
            method: "POST",
            body: JSON.stringify({
                post_id : id
            }),
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": csrfToken,
            },
        });

        // Réponse en JSON
        let json = await res.json();

        if (json.success) {
            let iconNotLike = document.querySelector(".post-notLiked-"+id);
           
            iconNotLike.classList.add("unlike_trigger");
            iconNotLike.classList.remove("like_trigger");

            iconNotLike.classList.add("fa-solid");
            iconNotLike.classList.remove("fa-regular");

            iconNotLike.classList.add("post-liked-"+id);
            iconNotLike.classList.remove("post-notLiked-"+id);

            let nbLike = document.querySelector(".nbcoeur-"+id).innerHTML;
            nbLike++;
            document.querySelector(".nbcoeur-"+id).innerHTML = nbLike;
        }
        
    } catch (error) {
        console.log(error);
    }
}

async function unlike(item) {
    let id =item.id;
    let url = "/likes/delete/"+id;
    try {
         let res = await fetch(url, {
             method: "POST",
             body: JSON.stringify({
                 post_id : id
             }),
             headers: {
                 "Content-Type": "application/json",
                 "X-CSRF-Token": csrfToken,
             },
         });
 
         // Réponse en JSON
         let json = await res.json();
 
         if (json.success) {
             let iconNotLike = document.querySelector(".post-liked-"+id);
             
             iconNotLike.classList.remove("fa-solid");
             iconNotLike.classList.add("fa-regular");

             iconNotLike.classList.remove("post-liked-"+id);
             iconNotLike.classList.add("post-notLiked-"+id);
 
             let nbLike = document.querySelector(".nbcoeur-"+id).innerHTML;
             nbLike--;
             document.querySelector(".nbcoeur-"+id).innerHTML = nbLike;
         }
         
     } catch (error) {
         console.log(error);
     }
 }

window.onload = function () {
    let userLike_trigger = document.querySelectorAll(
        ".like_trigger"
    );

    userLike_trigger.forEach(function (element) {
        element.addEventListener("click", function (e) {
            e.preventDefault();
            if (element.classList.contains("fa-regular")) {
                like(this);
            } else {
                unlike(this);
            }

        });
    });

    var imgPrev = document.querySelector('.img-prev');
    if(imgPrev != null) {
        document.querySelector('.input.file input').addEventListener('change', e => {
            imgPrev.style.height = 200 + 'px';
            imgPrev.style.backgroundImage = 'url(' + URL.createObjectURL(e.target.files[0]) + ')';
        });
    }

};