// for Edit Book
console.log("Edit bookk negn emenegn");
let delete_image = document.getElementById("delete_image");
delete_image.addEventListener("click", (e) => {
    if (window.confirm(`Are you sure you want to delete this?`)) {
        let book_id = e.target.dataset.id;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `<?php echo BASE_URI; ?>delete_book.php?id=${book_id}&d=im`);
        xhr.responseTept = "text";
        xhr.onload = function () {
            const serverResponse = xhr.response;
            if (serverResponse) {
                document.getElementById("book_profile").src = "<?php echo BASE_URI ?>/images/book/no_image.jpeg";
            }
        }
        xhr.send();
    }
});

